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
use App\Models\Dons;
use App\Models\DonsCollect;

class CollectController extends Controller
{
    /** Les dons et colllects */
    public function dons_collects(){
        $dons = Dons::whereNull('deleted_at')->where('started','<=',now())->where('finished','>=',now())
        ->orderBy('finished')->get();
        return view('users.dons.list_dons',compact('dons'));
    }

    /** Voir les détails d'un dons */
    public function show_dons_collects($slug){

        try {
            $collect = Dons::where('slug', $slug)->first();
            if(!$collect){
                return back()->with('error',"Une erreur est subvenue");
            }
            $paiements = DonsCollect::where('don_id',  $collect->id)->orderByDesc('id')->get();

            return view('users.dons.show_dons',compact('collect','paiements'));
        }catch (\Exception $e) {
            return back()->with('error',"Une erreur est subvenue");
        }

    }

    /** crééer un dons */
    public function admin_dons_collects(){
        $dons = Dons::whereNull('deleted_at')->orderByDesc('id')->get();

        return view('admin.dons.list',compact('dons'));
    }

    /** Liste des dons coté admi, */
    public function create_dons_collects(){
        return view('admin.dons.create');
    }

    /** Sauvegarder un dons */
    public function save_dons(Request $request){
        $request->validate([
            'title'=>['required','string','max:255'],
            'started' => ['required', 'date', 'after_or_equal:today', 'before:finished'],
            'finished' => ['required', 'date', 'after:started'],
            'cagnotte'=>['required','numeric','min:200'],
            'description'=>['required','string'],
            'tags'=>['nullable','string'],
        ]);

        try {

            $data = [
                'slug'=>slugify($request['title']),
                'reference'=> "AD".date('Y').Dons::count()+1,
                'title'=> $request['title'],
                'started'=> $request['started'],
                'finished'=> $request['finished'],
                'cagnotte'=> $request['cagnotte'],
                'description'=>$request['description'],
            ];

            if($request['tags']){
                $data['tags'] = json_encode(['tage2','tage3','Ouedo','Enfant']);
            }
            $data['picture']= 'picture.png';

            Dons::create($data);

           return redirect()->route('admin_dons_index')->with('success',"Dons enregistré avec succès");
        } catch (\Exception $e) {
            return back()->with('error',"Une erreur est subvenue");
        }
    }

    /**Modifier un dons */
    public function edit_dons_collects($id){
        $don = Dons::findOrFail( decrypt($id) );
        if($don){
            return view('admin.dons.edit',compact('don'));
        }
        return back()->with('error',"Une erreur est subvenue");
    }

    /**Update les infos */
    public function update_dons(Request $request){
        $request->validate([
            'collect_id'=>['required','string'],
            'title'=>['required','string','max:255'],
            'started' => ['required', 'date', 'before:finished'],
            'finished' => ['required', 'date', 'after:started'],
            'cagnotte'=>['required','numeric','min:200'],
            'description'=>['required','string'],
            'tags'=>['nullable','string'],
        ]);

        try {

            $dons = Dons::findOrFail( decrypt($request['collect_id']) );

            $data = [
                'slug'=>slugify($request['title']),
                'reference'=> "AD".date('Y').Dons::count()+1,
                'title'=> $request['title'],
                'started'=> $request['started'],
                'finished'=> $request['finished'],
                'cagnotte'=> $request['cagnotte'],
                'description'=>$request['description'],
            ];

            if($request['tags']){
                $data['tags'] = json_encode(['tage2','tage3','Ouedo','Enfant']);
            }
            $data['picture']= 'picture.png';

            $dons->update($data);

           return redirect()->route('admin_dons_index')->with('success',"Dons modifiés avec succès");
        } catch (\Exception $e) {
            return back()->with('error',"Une erreur est subvenue");
        }
    }

    /** Supprimer un dons */
    public function delete_dons_collects($id){
        $don = Dons::findOrFail( decrypt($id) );
        if($don){
            $don->update([
                'deleted_at'=> now(),
            ]);
            return redirect()->route('admin_dons_index')->with('success',"Dons supprimé avec succès");
        }
        return back()->with('error',"Une erreur est subvenue");
    }


}
