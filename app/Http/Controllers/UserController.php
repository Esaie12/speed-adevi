<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SubscriptionClasse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewAdminNotification;


class UserController extends Controller
{
    /** Lste des utilisateurs */
    public function list_users(){
        $users = User::whereNull('deleted_at')->where('role','user')->orderBy('id')->get();
        return view('admin.users.customers',compact('users'));
    }

    /** Liste des amdins */
    public function list_admins(){
        $admins = User::whereNull('deleted_at')->where('role','admin')->orderBy('id')->get();
        return view('admin.users.admins',compact('admins'));
    }

    /** Profil admin */
    public function admin_profil(){
        $admin = User::findOrFail(Auth::user()->id );
        if(!$admin){
            return back()->with('error',"Une erreur est subvenue");
        }
        return view('admin.profil_admin',compact('admin'));
    }


    public function profil_update_admin(Request $request){

        $request->validate([
            'lastname'=>['required','string','max:200'],
            'firstname'=>['required','string','max:200'],
            'phone'=>['required','string','max:20'],
            'birthday'=>['nullable','date'],
            'country'=>['required','string','max:50'],
            'adresse'=>['nullable','string','max:200'],
        ]);

        try {

            $admin = User::findOrFail(Auth::user()->id);

            $admin = $admin->update([
                'firstname' => $request['firstname'],
                'lastname' => $request['lastname'],
                'phone' => $request['phone'],
                'email' => $request['email'],
                'country' => $request['country'],
                'adresse' => $request['adresse'],
            ]);

           return redirect()->back()->with('success',"Profil modifié avec succès");

        } catch (\Exception $e) {
            return back()->with('error',"Une erreur est subvenue");
        }
    }

    /** Ajouter un admin */
    public function add_admin(){
        return view('admin.users.create_admin');
    }

    /** Suavegarder  un admin */
    public function save_admin(Request $request){
        $request->validate([
            'email'=>['required','email','unique:users,email'],
            'lastname'=>['required','string','max:200'],
            'firstname'=>['required','string','max:200'],
            'phone'=>['required','string','max:20'],
            'birthday'=>['nullable','date'],
            'country'=>['required','string','max:50'],
            'adresse'=>['nullable','string','max:200'],
        ]);

        try {

            $new_pwd = Str::random(8);

            $user = User::create([
                'account_id'=> "AD".date('Y').User::count()+1,
                'firstname' => $request['firstname'],
                'lastname' => $request['lastname'],
                'phone' => $request['phone'],
                'email' => $request['email'],
                'country' => $request['country'],
                'adresse' => $request['adresse'],
                'password'=> Hash::make( $new_pwd ),
                'role'=> 'admin',
            ]);

            Notification::send( $user , new NewAdminNotification( $user , $new_pwd ));

            return redirect()->route('list_admins')->with('success',"Collaborateur ajouté avec succès");

        } catch (\Exception $e) {
            return back()->with('error',"Une erreur est subvenue");
        }
    }

    /** Editer un amdin */
    public function edit_admin($id){
        $admin = User::findOrFail( decrypt($id) );
        if(!$admin){
            return back()->with('error',"Une erreur est subvenue");
        }
        return view('admin.users.edit_admin',compact('admin'));
    }

    /** Modifier les informations */
    public function update_admin(Request $request){

        $id = decrypt($request->admin_id);
        $request->validate([
            'email'=>['required','email','unique:users,email,'.$id],
            'lastname'=>['required','string','max:200'],
            'firstname'=>['required','string','max:200'],
            'phone'=>['required','string','max:20'],
            'birthday'=>['nullable','date'],
            'country'=>['required','string','max:50'],
            'adresse'=>['nullable','string','max:200'],
        ]);

        try {

            $admin = User::findOrFail($id);

            $admin = $admin->update([
                'firstname' => $request['firstname'],
                'lastname' => $request['lastname'],
                'phone' => $request['phone'],
                'email' => $request['email'],
                'country' => $request['country'],
                'adresse' => $request['adresse'],
            ]);

           return redirect()->route('list_admins')->with('success',"Collaborateur ajouté avec succès");

        } catch (\Exception $e) {
            return back()->with('error',"Une erreur est subvenue");
        }
    }

    /** Bloquer un user */
    public function block_user($id){
        $user = User::findOrFail( decrypt($id) );
        if(! $user){
            return back()->with('error',"Une erreur est subvenue");
        }
        $user->update([
            'actif'=> false,
        ]);
        return back()->with('success', "Utilisateur bloqué avec succès");
    }

    /** Fonction debloquer */
    public function unblock_user($id){
        $user = User::findOrFail( decrypt($id) );
        if(! $user){
            return back()->with('error',"Une erreur est subvenue");
        }
        $user->update([
            'actif'=> true,
        ]);
        return back()->with('success', "Utilisateur débloqué avec succès");
    }
}
