<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Cursus;
use Illuminate\Support\Carbon;

class MakeSubscription extends Component
{
    public $category_id;
    public $cursus=[];
    public $details=[];
    public $my_choice = null;
    public $subs =null;
    public $url_back ='';
    public $my_id ;
    public $my_amount = 0;

    public function mount($category_id){
        $this->category_id = $category_id;

        $this->cursus = Cursus::whereNull('deleted_at')->where('category_id',$this->category_id )->get();


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

    public function choiceCursus($id_choice){

        $this->my_choice = $id_choice;
        if($this->my_choice >0){
            $this->subs = Cursus::find($this->my_choice);


            $this->details = $this->generateSubscriptionDates( now(), $this->subs->duree_mensuelle ,  $this->subs->forfait_mensuel ,  $this->subs->montant_cursus  );

           // dd($id_choice);
            $this->my_id = $this->subs->id;
            $this->my_amount = $this->subs->forfait_mensuel;


            $this->url_back = route('paiement', $this->my_choice);
            //$this->url_back = $this->my_choice;
          //  $this->dispatch('choiceCursus', $this->url_back);
        }
    }

    public function render()
    {
        return view('livewire.user.make-subscription');
    }



}
