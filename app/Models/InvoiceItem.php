<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;

     // La table associée au modèle
     protected $table = 'invoice_items';

     // Les attributs qui sont mass assignable
     protected $fillable = [
         'invoice_id',
         'quantity',
         'amount',
         'item',
         'description',
     ];

     // Les attributs qui devraient être cachés pour les tableaux JSON
     protected $hidden = [];

     // Les attributs qui devraient être castés en types natifs
     protected $casts = [
         'quantity' => 'integer',
         'amount' => 'integer',
     ];

     // Définir la relation avec le modèle Invoice
     public function invoice()
     {
         return $this->belongsTo(Invoice::class);
     }

}
