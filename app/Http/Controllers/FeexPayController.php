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
use Illuminate\Support\Facades\Http;
use App\Models\Invoice;
use App\Models\InvoiceItem;

class FeexPayController extends Controller
{

    public $api_key , $sandbox , $feex_link;

    public function __construct(){
        $this->apiKey = 'fp_7xP5wCj0FprPk8Xvx73Qv99OpwjMzrtaMGeBUVnSkXdMFmLJ67YqODhBCgUNZ8wT';
        $this->feex_link = "https://api.feexpay.me/api/transactions/public";
        $this->sandbox = true;

    }

    public function validPay($idTransaction){
        if (!$idTransaction) {
            return false;
            //return response()->json(['error' => 'ID de transaction requis'], 400);
        }
        $url = $this->feex_link."/".$idTransaction;

        //try {
            $response = Http::withHeaders([
                'Authorization' => "Bearer $this->apiKey",
            ])->get($url);

            if ($response->successful()){
               $response = json_decode($response , true);
                return $data = [
                    'id'=> $response['reference'],
                    "amount" => $response['amount'],
                    "status"  =>"SUCCESSFUL"
                ];
            }
            return false;
        /*} catch (\Exception $e) {
            return false;
        }*/

    }

    /** Faire un abonnement */
    public function payments(Request $request, $id_cursus){


        $pay = $this->validPay( $request->input('id_transaction') );

        if($pay == false){
            return back()->with('error',"Non");
        }

        $now = Carbon::now();

        if( in_array($pay['status'] , ['SUCCESSFUL'])){
            //amount
            $cursus = Cursus::find($id_cursus);

            $data = [
                'reference'=> date('Y').Auth::user()->id.Subscription::count()+1,
                'user_id' => Auth::user()->id ,
                'cursus_id' =>  $id_cursus,
                'date_inscription' => now() ,
                'amount' => $cursus->montant_cursus ,
                'last_paiement' => now() ,
                'started_at' => now() ,
                'pay_inscription'=> now() ,
                'amount_inscription'=> $cursus->montant_inscription,
                'finish_at' => $now->addYears( $cursus->nombre_year ) ,
            ];

            if( $pay['amount']== ($cursus->montant_cursus + $cursus->montant_inscription) ){
                //Créer l'abonnement pour lui et gérer les factures.
                $data['method_pay'] = "Complet";

                $pay_at = now();
                $transaction_id = $pay['id'] ;

            }elseif( $pay['amount']== ($cursus->forfait_mensuel + $cursus->montant_inscription) ){
                $data['method_pay'] = "Tranche";

                $pay_at =  null ;
                $transaction_id = null  ;
            }

            $tab=[];
            $arrays = json_decode($cursus->classes , true);
            foreach ($arrays as  $value) {
               $tab[]=  $value;
            };

            $chunkSize = 4; // Nombre de tranches par groupe
            $callseId = 0;  // Valeur initiale de 'callse_id'
            $trancheCount = 0;

            $subscription = Subscription::create($data);

            $les_tranches = $this->generateSubscriptionDates( now() , $cursus->duree_mensuelle  ,  $cursus->forfait_mensuel ,  $cursus->montant_cursus );

            foreach ($les_tranches as $key=> $tranche) {
                $tranche = Tranche::create([
                    'subscription_id' => $subscription->id,
                    'date_tranche' => $tranche['date'],
                    'pay_at' => $pay_at,
                    'amount' => $cursus->forfait_mensuel ,
                    'transaction_id' => $transaction_id,
                    'classe_id'=> $tab[$callseId] ,
                ]);

                if($key==0 and $data['method_pay'] == "Tranche" ){
                    $tranche->update([
                        'pay_at' => now(),
                        'transaction_id' => $pay->id,
                    ]);
                }

                $trancheCount++;
                // Changer 'callse_id' tous les 4 tranches
                if ($trancheCount % $chunkSize == 0) {
                    $callseId++;
                }
            }



            $les_classes = Classe::whereIn('id', $tab )->get();


            foreach ($les_classes as $class) {
                SubscriptionClasse::create([
                    'classe_id'=> $class->id,
                    'subscription_id'=>  $subscription->id,
                ]);
            }

            //Créer maintenant la facture
            $invoice = Invoice::create([
                'reference'=> "AD".(Invoice::count()+1).date('Y'),
                'user_id' => Auth::user()->id,
                'date_invoice' => now(),
                'amount' =>  $pay['amount'],
            ]);
            InvoiceItem::create([
                'invoice_id' => $invoice->id,
                'quantity'=> 1,
                'amount' => $cursus->montant_inscription,
                'item' => "Souscrire à l'abonnement ".$subscription->reference ,
                'description' =>  "inscription",
            ]);

            if( $pay['amount']== ($cursus->montant_cursus + $cursus->montant_inscription) ){

                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'quantity'=> 1,
                    'amount' => $cursus->montant_cursus,
                    'item' => "Payer les tranches de mon abonnemet ".$subscription->reference ,
                    'description' =>  "Payer la totalité au comptant",
                ]);
            }elseif( $pay['amount']== ($cursus->forfait_mensuel + $cursus->montant_inscription) ){
                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'quantity'=> 1,
                    'amount' => $cursus->forfait_mensuel,
                    'item' => "Payer la 1ere tranche de mon abonnemet ".$subscription->reference ,
                    'description' =>  "Payer par tranche",
                ]);
            }



            //Mail::to($user->email)->send(new NewSubscriptionNotification());
            Notification::send(Auth::user(), new NewSubscriptionNotification( $subscription , $les_tranches  ));

            return redirect()->route('user_dashboard')->with('success',"Abonnement activé avec succès");

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


    /** Paiement par tranche */
    public function payments_tranche(Request $request){
        $now = Carbon::now();

        $pay = $this->validPay( $request->input('id_transaction') );

        if($pay == false){
            return back()->with('success',"Paiement effectué avec succès");
        }

        if( in_array($pay['status'] , ['SUCCESSFUL'])){

            Tranche::findOrFail($request->id)->update([
                'pay_at' => $now,
                'transaction_id' => $pay['id'],
            ]);

            $tranche = Tranche::findOrFail($request->id);

            //Créer maintenant la facture
            $invoice = Invoice::create([
                'reference'=> "AD".(Invoice::count()+1).date('Y'),
                'user_id' => Auth::user()->id,
                'date_invoice' => now(),
                'amount' =>  $pay['amount'],
            ]);
            InvoiceItem::create([
                'invoice_id' => $invoice->id,
                'quantity'=> 1,
                'amount' =>$pay['amount'],
                'item' => "Payer la tranche de mon abonnement ".$tranche->subscription->reference ,
                'description' =>  $tranche->subscription->cursus->title,
            ]);

            Notification::send(Auth::user(), new TranchePaymentNotification( $tranche ));

        }

        return back()->with('success',"Paiement effectué avec succès");
    }

    /** Faire un dons */
    public function payments_donate(Request $request){

        $pay = $this->validPay( $request->input('id_transaction') );

        if($pay == false){
            return back()->with('error',"Non");
        }

        try {
            $id_don = $request->id;
            $don = Dons::findOrFail($id_don);

            if( in_array($pay['status'] , ['SUCCESSFUL'])){

                $ligne = DonsCollect::create([
                    'user_id' => Auth::user()->id,
                    'don_id' => $id_don ,
                    'amount' => $pay['amount'],
                    'transaction_id' =>  "transaction",
                ]);

                $don->update([
                    'amount_collect' => $don->amount_collect + $pay['amount'],
                ]);


                Notification::send(Auth::user(), new MakeDonationNotification( $don , $ligne ));

                //Créer maintenant la facture
                $invoice = Invoice::create([
                    'reference'=> "AD".(Invoice::count()+1).date('Y'),
                    'user_id' => Auth::user()->id,
                    'date_invoice' => now(),
                    'amount' =>  $pay['amount'],
                ]);
                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'quantity'=> 1,
                    'amount' =>$pay['amount'],
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
