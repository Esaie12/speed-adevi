<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cursus;
use App\Models\Subscription;
use App\Models\Tranche;
use App\Models\User;
use App\Models\SubscriptionClasse;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewSubscriptionNotification;
use App\Notifications\LivraisonKitsNotification;

class SubscriptionController extends Controller
{
    /** Mes abonnements */
    public function user_subscription(){
       $abonnements = Subscription::where('user_id',Auth::user()->id)->get();

       return view('users.abonnement.list',compact('abonnements'));
    }

    /** Voir un abonnement en details */
    public function subscription_show($id){
        $abonnement_id = decrypt($id);

        $abonnement = Subscription::find($abonnement_id);
        $tranches = Tranche::where('subscription_id',  $abonnement_id)->get();
        $les_classes = SubscriptionClasse::where('subscription_id',  $abonnement_id)->get();

        return view('users.abonnement.show_abonnement',compact('tranches','abonnement','les_classes'));
    }

    /** les tranches */
    public function user_tranches(Request $request){

        $tranches = Tranche::whereIn('subscription_id',function($query){
            $query->select('id')->from('subscriptions')->where('user_id',Auth::user()->id);
        });

        if(isset($request->filter)){
            if($request->filter == "unpaid"){
                $tranches = $tranches->whereNull('pay_at');
                $title = "Toutes les tranches impayées";
            }
            if($request->filter == "paid"){
                $tranches = $tranches->whereNotNull('pay_at');
                $title = "Toutes les tranches payées";
            }
        }else{
            $title = "Toutes les tranches";
        }

        $tranches = $tranches->paginate(6);

        return view('users.abonnement.tranches',compact('tranches','title'));
    }

    /** Listes les abonnements coté admin */
    public function admin_subscription(){
        $abonnements = Subscription::orderByDesc('id')->get();

        return view('admin.abonnement.list',compact('abonnements'));
    }

    /** Voir un abonnement coté admins */
    public function admin_subscription_show($id){
        $abonnement_id = decrypt($id);

        $abonnement = Subscription::find($abonnement_id);
        $tranches = Tranche::where('subscription_id',  $abonnement_id)->get();
        $les_classes = SubscriptionClasse::where('subscription_id',  $abonnement_id)->get();

        return view('admin.abonnement.show_abonnement',compact('tranches','abonnement','les_classes'));
    }

    /** Confirmer paiement d'une tranche */
    public function admin_tranche_pay($id){

        $now = Carbon::now();

        Tranche::findOrFail(decrypt($id))->update([
            'pay_at' => $now,
            'transaction_id' => "admin-confirm",
        ]);

        $tranche = Tranche::findOrFail(decrypt($id));
        //Notification::send(Auth::user(), new TranchePaymentNotification( $tranche ));

        return back()->with('success',"Paiement effectué avec succès");
    }

    /** Livrer */
    public function admin_livrer($id){

        $classe = SubscriptionClasse::findOrFail(decrypt($id));
        $classe->update([
            'status_id' => 2,
        ]);

        $abonnement = Subscription::findOrFail($classe->subscription_id);

        $user = User::find($abonnement->user_id);
        Notification::send($user, new LivraisonKitsNotification($abonnement ,  $classe  ));

        return back()->with('success',"Livraison effectuée avec succès");
    }

}
