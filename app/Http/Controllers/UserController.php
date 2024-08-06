<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SubscriptionClasse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


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

        User::create([
            'account_id'=> "AD".date('Y').User::count()+1,
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'phone' => $request['phone'],
            'email' => $request['email'],

            'country' => $request['country'],

            'adresse' => $request['adresse'],
            'password'=> Hash::make('P@ssw0rd'),
            'role'=> 'admin',
        ]);

        return redirect()->route('list_admins')->with('success',"Collaborateur ajouté avec succès");

        /*
        ,"lastname":"Nom","firstname":"prpe","phone":"5555","birthday":"2024-08-06","country":"Pays","adresse":"Adres"
        */
        try {

        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
