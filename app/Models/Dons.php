<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dons extends Model
{
    use HasFactory;

    protected $table = "dons";

    protected $fillable = [
        'reference',
        'picture',
        'title',
        'started',
        'finished',
        'cagnotte',
        'amount_collect',
        'description',
        'tags',
        'slug'
    ];


    public function transactions()
    {
        return $this->hasMany(DonsCollect::class,'don_id');
    }

    public function calculate_collect_percentage()
    {

        $total = 0;
        $recus = $this->transactions;

        foreach ($recus as $value) {
            $total += $value->amount;
        }

        return ($total / $this->cagnotte) * 100;
    }

    public function collect_percentage()
    {
        return $this->calculate_collect_percentage();
    }

}
