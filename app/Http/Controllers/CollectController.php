<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollectController extends Controller
{
    /** Les dons et colllects */
    public function dons_collects(){
        return view('users.dons.list_dons');
    }

    /** Voir les détails d'un dons */
    public function show_dons_collects($id){
        return view('users.dons.show_dons');
    }
}
