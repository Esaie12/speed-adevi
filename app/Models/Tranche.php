<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tranche extends Model
{
    use HasFactory;
    protected $table = 'tranches';

    protected $fillable = [
        'subscription_id',
        'status_id',
        'date_tranche',
        'pay_at',
        'amount',
        'transaction_id','classe_id'
    ];

    protected $dates = [
        'pay_at',
    ];

    // Relation avec le modèle Subscription
    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

    public function status()
    {
        return $this->belongsTo(TrancheStatus::class, 'status_id');
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id');
    }
}
