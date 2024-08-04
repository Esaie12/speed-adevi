<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Cursus;
use App\Models\Subscription;
use App\Models\Tranche;

class AppController extends Controller
{
    public function truncate_all_notifications(){

        Auth::user()->notifications->where('notifiable_id', Auth::user()->id)->markAsRead();

        return redirect()->back()->with('success',"Notifications vidées avec succès");
    }

    public function user_dashboard() {

        $data = [
            'abonnement'=> 0,
            'abonnement_amount'=> 0,
            'paid' => 0,
            'paid_amount' => 0,
            'unpaid' => 0,
            'unpaid_amount' => 0,
            'retard' => 0,
            'retard_amount' => 0,
        ];


        $abonnements = Subscription::where('user_id',Auth::user()->id)->get();
        foreach ($abonnements as $abon) {
            $data['abonnement']++;
            $data['abonnement_amount'] += ( $abon->amount + $abon->amount_inscription );
        }

        // Récupérer les tranches pour les abonnements de l'utilisateur
        $tranches = Tranche::whereIn('subscription_id', function($query)  {
            $query->select('id')->from('subscriptions')->where('user_id', Auth::user()->id );
        })->get();


        // Calculer les différentes valeurs
        foreach ($tranches as $tranche) {
            if ($tranche->pay_at) {
                $data['paid']++;
                $data['paid_amount'] += $tranche->amount;
            } else {
                if ($tranche->date_tranche > date('Y-m-d')) {
                    $data['unpaid']++;
                    $data['unpaid_amount'] += $tranche->amount;
                } else {
                    $data['retard']++;
                    $data['retard_amount'] += $tranche->amount;
                }
            }
        }

        return view('users.dashboard',compact('data'));
    }

    public function user_profil(){
        return view('users.profil');
    }

    public function user_update_profil(Request $request){

        $request->validate([
            'firstname' => 'nullable|string|max:255',
            'lastname' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|string|email|max:255|unique:users,email,' . Auth::id(),
            'profession' => 'required|string|max:255',
            'website' => 'nullable|url|max:255',
            'country' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'others' => 'required|string|max:255',
        ]);

        User::find( Auth::user()->id )->update([
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'profession' => $request['profession'],
            'website' => $request['website'],
            'country' => $request['country'],
            'department' => $request['department'],
            'adresse' => $request['adresse'],
            'others' => $request['others'],
            'percentage'=> 100,
        ]);

        return redirect()->back()->with('success', 'Profil mis à jour avec succès.');

    }

    public function update_password(Request $request){
        $request->validate([
            'recent_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);
        $user = Auth::user();


        if (!Hash::check($request->recent_password, $user->password)) {
            return back()->withErrors(['recent_password' => 'L\'ancien mot de passe est incorrect']);
        }

        // Mettre à jour le mot de passe de l'utilisateur
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->back()->with('success', 'Mot de passe mis à jour avec succès.');
    }

}
