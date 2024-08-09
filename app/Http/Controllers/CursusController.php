<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Cursus;
use App\Models\Classe;
use App\Models\TrancheStatus;

class CursusController extends Controller
{


    /** Liste des cusrsus coté admins */
    public function admin_list_cursus() {
        $categories = Category::whereNull('deleted_at')->get();
        $cursus = Cursus::whereNull('deleted_at')->get();
        $classes = Classe::all();

        return view('admin.cursus.index',compact('cursus','categories','classes'));
    }

    /** Créer un cursus */
    public function admin_cursus_save(Request $request){

        $request->validate([
            'classes' => 'required|array',
            'category' => 'required|integer|exists:categories,id',
            'title' => 'required|string|max:255',
            'duree_year' => 'required|integer|min:1',
            'mensuality' => 'required|numeric|min:0',
            'amount_monthly' => 'required|numeric|min:0',
            'inscription' => 'required|numeric|min:0',
            'amount' => 'required|numeric|min:0',
        ]);


        $classe_choice = [];
        foreach ($request['classes'] as $value) {
            $classe_choice[]= $value;
        }
        if( count($classe_choice) != $request['duree_year'] ){
            return back()->with('error', "Le nombre d'année et le nombre de classe choisit sont différents");
        }

        try {
            Cursus::create([
                'category_id' => $request['category'],
                'title' =>  $request['title'],
                'nombre_year' =>  $request['duree_year'],
                'duree_mensuelle' =>  $request['mensuality'],
                'forfait_mensuel' => $request['amount_monthly'],
                'montant_inscription' =>  $request['inscription'],
                'montant_cursus' =>  $request['amount'],
                'classes' => json_encode($classe_choice),
            ]);

            return redirect()->route('admin_cursus_index')->with('success',"Cursus crée avec succès");

        }catch (\Exception $e){
            return back()->with('error', "Une erreur est survenue lors de la création du cursus.");
        }

    }

    /** Supprimer un cursus */
    public function deleteCursus($id){
        $id = decrypt($id);
        try {
            Cursus::findOrFail($id)->update([
                'deleted_at'=> now() ,
            ]);
            return redirect()->back()->with('success',"Cursus supprimée avec succès");
        } catch (\Exception $e) {
            return back()->with('error',"Une erreur est subvenue");
        }
    }
}
