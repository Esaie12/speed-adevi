<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Cursus;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    //**Listes des catégories */
    public function adminListCategory(){
        $categories = Category::whereNull('deleted_at')->get();
        return view('admin.category.index',compact('categories'));
    }

    /** Sauvegarder une categrorie */
    public function saveCategory(Request $request){
        $request->validate([
            'title'=>['required','string','max:255'],
            'description'=>['nullable','string','max:255']
        ]);
        try {
            Category::create([
                'title' => $request->title,
                'description' => $request->description,
                'picture' => null,
                'slug' => slugify( $request->title),
            ]);
            return back()->with('success',"Catégorie crée avec succès");
        } catch (\Exception $e) {
            return back()->with('error',"Une erreur est subvenue");
        }

    }

    /** Efaccer une categorie */
    public function deleteCategory($id){
        $id = decrypt($id);
        try {
            Category::findOrFail($id)->update([
                'deleted_at'=> now() ,
            ]);
            return redirect()->back()->with('success',"Categorie supprimée avec succès");
        } catch (\Exception $e) {
            return back()->with('error',"Une erreur est subvenue");
        }
    }

    /** Modifer une categori */
    public function editCategory($id){
        $id = decrypt($id);
        try {
            $category =Category::findOrFail($id);
            return view('admin.category.edit',compact('category'));
        } catch (\Exception $e) {
            return back()->with('error',"Une erreur est subvenue");
        }
    }

    /** Mettre à jour */
    public function updateCategory(Request $request){
        $request->validate([
            'category_id'=>['required','string'],
            'title'=>['required','string','max:255'],
            'description'=>['nullable','string','max:255']
        ]);

        try {
            $id = decrypt($request->category_id);

            Category::findOrFail($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'picture' => null,
                'slug' => slugify( $request->title),
            ]);
            return redirect()->route('admin_category_index')->with('success',"Categorie modifiée avec succès");
        } catch (\Exception $e) {
            return back()->with('error',"Une erreur est subvenue");
        }
    }

    public function category_pack_list() {
        $categories = Category::whereNull('deleted_at')->get();
        return view('users.pack',compact('categories'));
    }

    public function category_pack_show($slug){

        try {
            $pack =Category::where('slug',$slug)->first();
            if($pack){
                return view('users.pack_show',compact('pack'));
            }
            return back()->with('error',"Une erreur est subvenue");
        } catch (\Exception $e) {
            return back()->with('error',"Une erreur est subvenue");
        }
    }

    public function final_pack($id){
        $cursus_id = $id;

        $subs = Cursus::find( $cursus_id);

        $details = $this->generateSubscriptionDates( now(), $subs->duree_mensuelle ,  $subs->forfait_mensuel ,  $subs->montant_cursus  );

        return view('users.pack-final',compact('subs','details'));
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


}
