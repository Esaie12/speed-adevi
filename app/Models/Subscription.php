<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $table = 'subscriptions';

    protected $fillable = [
        'reference',
        'user_id',
        'cursus_id',
        'status_id',
        'date_inscription',
        'amount',
        'last_paiement',
        'started_at',
        'finish_at',
        'amount_inscription' , 'pay_inscription','method_pay'
    ];

    protected $dates = [
        'date_inscription',
        'last_paiement',
    ];


    // Relation avec le modèle User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation avec le modèle Cursus
    public function cursus()
    {
        return $this->belongsTo(Cursus::class);
    }

    // Optionnel: Si vous avez un modèle pour Status
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
