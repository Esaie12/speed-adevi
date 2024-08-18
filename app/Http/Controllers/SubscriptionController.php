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
use App\Models\Status;
use App\Models\TrancheStatus;
use App\Models\Category;
use App\Models\Classe;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewSubscriptionNotification;
use App\Notifications\LivraisonKitsNotification;

class SubscriptionController extends Controller
{
    /** Mes abonnements */
    public function user_subscription(){
        $categories = Category::whereNull('deleted_at')->get(['title']);
        $status =  Status::select(['title'])->get();
       $abonnements = Subscription::where('user_id',Auth::user()->id)->get();
        return view('users.abonnement.list',compact('abonnements','categories','status'));
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
        $categories = Category::whereNull('deleted_at')->get(['title']);
        $status =  Status::select(['title'])->get();
        $abonnements = Subscription::orderByDesc('id')->get();

        return view('admin.abonnement.list',compact('abonnements','categories','status'));
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

    /** MArquer la fin d'un abonnement */
    public function finish_subscription_admin($id){
        $abonnement_id = decrypt($id);
        //$tranches = Tranche::where('subscription_id',  $abonnement_id)->get();
        //$les_classes = SubscriptionClasse::where('subscription_id',  $abonnement_id)->get();

        try {
            $abonnement = Subscription::findOrFail($abonnement_id);
            $abonnement->update([
                'status_id'=> 4,
            ]);
            return back()->with('success',"Abonnement terminer avec succès");
        } catch (\Exception $e) {
            return back()->with('error',"Une erreur est subvenue");
        }
    }

    /**Stopper un abonnement */
    public function stop_subscription_admin($id){
        $abonnement_id = decrypt($id);

        try {
            $abonnement = Subscription::findOrFail($abonnement_id);
            $abonnement->update([
                'status_id'=> 3,
            ]);
            return back()->with('success',"Abonnement terminer avec succès");
        } catch (\Exception $e) {
            return back()->with('error',"Une erreur est subvenue");
        }
    }

    /**  Réactiver un abonnement */
    public function reactiver_subscription_admin($id){
        $abonnement_id = decrypt($id);

        try {
            $abonnement = Subscription::findOrFail($abonnement_id);
            $abonnement->update([
                'status_id'=> 2,
            ]);
            return back()->with('success',"Abonnement réactivé avec succès");
        } catch (\Exception $e) {
            return back()->with('error',"Une erreur est subvenue");
        }
    }

    /*** Listes des tranches */
     public function admin_list_tranche(){
        $categories = Category::whereNull('deleted_at')->get();
        $cursus = Cursus::whereNull('deleted_at')->get();
        $status =  TrancheStatus::select(['title'])->get();

        $classes = Classe::all();
        $tranches = Tranche::all();

        return view('admin.abonnement.list_tranches',compact('tranches','classes', 'categories','status','tranches'));
    }

}
