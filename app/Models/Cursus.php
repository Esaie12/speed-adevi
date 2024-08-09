<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Classe;

class Cursus extends Model
{
    use HasFactory;

    protected $table= "cursus";

    protected $fillable = [
        'category_id',
        'title',
        'nombre_year',
        'duree_mensuelle',
        'forfait_mensuel',
        'montant_inscription',
        'montant_cursus',
        'classes',
        'deleted_at'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getClasses()
    {
        // Récupère les IDs des classes
        $classIds = $this->classes ?? [];

        // Récupère les instances des classes depuis la base de données
        return Classe::whereIn('id', $classIds)->get();
    }

}
