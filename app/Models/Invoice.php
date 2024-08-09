<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoices';

    // Les attributs qui sont mass assignable
    protected $fillable = [
        'reference',
        'user_id',
        'status_id',
        'date_invoice',
        'agregateur',
        'amount',
    ];

    // Les attributs qui devraient être cachés pour les tableaux JSON
    protected $hidden = [];

    // Les attributs qui devraient être castés en types natifs
    protected $casts = [
        'date_invoice' => 'datetime',
        'amount' => 'integer',
    ];

    // Définir la relation avec le modèle User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
