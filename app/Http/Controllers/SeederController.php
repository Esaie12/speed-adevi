<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cursus;
use App\Models\Subscription;
use App\Models\Tranche;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Classe;
use App\Models\SubscriptionClasse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewSubscriptionNotification;
use App\Notifications\TranchePaymentNotification;
use App\Notifications\MakeDonationNotification;
use App\Models\Dons;
use App\Models\DonsCollect;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\User;

class SeederController extends Controller
{


    public function payments($userId, $idCursus , $type)
    {
        $now = Carbon::now();
        $cursus = Cursus::find($idCursus);

        if($type == 0){
            $amount = $cursus->forfait_mensuel + $cursus->montant_inscription;
        }else{
            $amount = $cursus->montant_cursus  + $cursus->montant_inscription;
        }


        if (!$cursus) {
            throw new \Exception("Cursus not found");
        }

        $pay = [
            'status' => 'SUCCESS',
            'amount' => $amount, // Assurez-vous que $amount est défini quelque part avant
            'transaction_id' => "FAKE-TRANSACTION",
        ];

        if (in_array($pay['status'], ['SUCCESS'])) {
            $data = [
                'reference' => date('Y') . $userId . (Subscription::count() + 1),
                'user_id' => $userId,
                'cursus_id' => $idCursus,
                'date_inscription' => $now,
                'amount' => $cursus->montant_cursus,
                'last_paiement' => $now,
                'started_at' => $now,
                'pay_inscription' => $now,
                'amount_inscription' => $cursus->montant_inscription,
                'finish_at' => $now->copy()->addYears($cursus->nombre_year),
            ];

            if ($pay['amount'] == ($cursus->montant_cursus + $cursus->montant_inscription)) {
                $data['method_pay'] = "Complet";
                $payAt = $now;
                $transactionId = $pay['transaction_id'];
            } elseif ($pay['amount'] == ($cursus->forfait_mensuel + $cursus->montant_inscription)) {
                $data['method_pay'] = "Tranche";
                $payAt = null;
                $transactionId = null;
            }

            // Créer l'abonnement
            $subscription = Subscription::create($data);

            // Générer les tranches de paiement
            $lesTranches = $this->generateSubscriptionDates($now, $cursus->duree_mensuelle, $cursus->forfait_mensuel, $cursus->montant_cursus);

            $chunkSize = 4; // Nombre de tranches par groupe
            $callseId = 0;  // Valeur initiale de 'callse_id'
            $trancheCount = 0;

            $classesIds = json_decode($cursus->classes, true);

            foreach ($lesTranches as $key => $trancheData) {
                $tranche = Tranche::create([
                    'subscription_id' => $subscription->id,
                    'date_tranche' => $trancheData['date'],
                    'pay_at' => $payAt,
                    'amount' => $cursus->forfait_mensuel,
                    'transaction_id' => $transactionId,
                    'classe_id' => $classesIds[$callseId],
                ]);

                if ($key == 0 && $data['method_pay'] == "Tranche") {
                    $tranche->update([
                        'pay_at' => $now,
                        'transaction_id' => "FAKE-TRANSACTION",
                    ]);
                }

                $trancheCount = $trancheCount+1;
                if ($trancheCount % $chunkSize == 0) {
                    $callseId++;
                }
            }

            // Associer les tranches aux classes
            $classes = Classe::whereIn('id', $classesIds)->get();

            foreach ($classes as $class) {
                $lesTrClasses = Tranche::where('subscription_id', $subscription->id)
                    ->where('classe_id', $class->id)
                    ->pluck('id')
                    ->toArray();

                SubscriptionClasse::create([
                    'classe_id' => $class->id,
                    'subscription_id' => $subscription->id,
                    'tranches' => json_encode($lesTrClasses),
                ]);
            }

            // Créer la facture
            $invoice = Invoice::create([
                'reference' => "AD" . (Invoice::count() + 1) . date('Y'),
                'user_id' => $userId,
                'date_invoice' => $now,
                'amount' => $pay['amount'],
                'agregateur' => "KKIAPAY",
            ]);

            // Créer les éléments de la facture
            InvoiceItem::create([
                'invoice_id' => $invoice->id,
                'quantity' => 1,
                'amount' => $cursus->montant_inscription,
                'item' => "Souscrire à l'abonnement " . $subscription->reference,
                'description' => "Inscription",
            ]);

            if ($pay['amount'] == ($cursus->montant_cursus + $cursus->montant_inscription)) {
                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'quantity' => 1,
                    'amount' => $cursus->montant_cursus,
                    'item' => "Payer les tranches de mon abonnement " . $subscription->reference,
                    'description' => "Paiement total au comptant",
                ]);
            } elseif ($pay['amount'] == ($cursus->forfait_mensuel + $cursus->montant_inscription)) {
                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'quantity' => 1,
                    'amount' => $cursus->forfait_mensuel,
                    'item' => "Payer la 1ère tranche de mon abonnement " . $subscription->reference,
                    'description' => "Paiement par tranche",
                ]);
            }

            // Envoyer une notification par e-mail
            $user = User::find($userId);
           // Notification::send($user, new NewSubscriptionNotification($subscription, $lesTranches));

            // return redirect()->route('user_dashboard')->with('success', "Abonnement activé avec succès");
        }
    }


    public function generateSubscriptionDates($startDate, $months, $forfait, $montantTotal) {
        // Créer une instance Carbon à partir de la date de début fournie
        $start_date = Carbon::parse($startDate);
        $current_date = $start_date->copy();

        $subscription_dates = [];
        $total_montant = 0;

        while ($total_montant < $montantTotal) {
            $subscription_dates[] = [
                'date' => $current_date->toDateString(),
                'formatted_date' => $current_date->translatedFormat('l j F Y'),
                'forfait' => $forfait,
                'total_montant' => $total_montant
            ];
            $current_date->addMonths($months);
            $total_montant += $forfait;
        }

        return $subscription_dates;
    }


    /** Faire un dons */
    public function payments_donate(Request $request){

        $pay = $this->kkiapay->verifyTransaction($request->transaction_id);

        try {
            $id_don = $request->id;
            $don = Dons::findOrFail($id_don);

            if( in_array($pay->status , ['SUCCESS'])){

                $ligne = DonsCollect::create([
                    'user_id' => $user_id,
                    'don_id' => $id_don ,
                    'amount' => $pay->amount ,
                    'transaction_id' =>  "transaction",
                ]);

                $don->update([
                    'amount_collect' => $don->amount_collect + $pay->amount,
                ]);


                Notification::send(Auth::user(), new MakeDonationNotification( $don , $ligne ));

                 //Créer maintenant la facture
                $invoice = Invoice::create([
                    'reference'=> "AD".(Invoice::count()+1).date('Y'),
                    'user_id' => $user_id,
                    'date_invoice' => now(),
                    'amount' =>  $pay->amount,
                    'agregateur'=> "KKIAPAY"
                ]);
                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'quantity'=> 1,
                    'amount' =>$pay->amount,
                    'item' => "Participer à la collecte" ,
                    'description' => $don->title,
                ]);

                return back()->with('success',"Merci pour votre dons");
            }
            return back()->with('error',"Une erreur est subvenue");
        } catch (\Exception $e) {
            return back()->with('error',"Une erreur est subvenue");
        }
    }

}
