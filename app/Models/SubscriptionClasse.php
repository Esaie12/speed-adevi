<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionClasse extends Model
{
    use HasFactory;
    protected $table = 'subscription_classes';

    protected $fillable = [
        'classe_id','subscription_id','status_id','tranches'
    ];

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function status()
    {
        return $this->belongsTo(TrancheStatus::class, 'status_id');
    }


}
