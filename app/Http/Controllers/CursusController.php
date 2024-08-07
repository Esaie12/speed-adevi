<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Cursus;


class CursusController extends Controller
{
    /** Liste des cusrsus coté admins */
    public function admin_list_cursus() {
        $categories = Category::whereNull('deleted_at')->get();
        $cursus = Cursus::all();
        return view('admin.cursus.index',compact('cursus','categories'));
    }

    /** Créer un cursus */
    public function admin_cursus_save(Request $request){
        return $request;
    }
}
