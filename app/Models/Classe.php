<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    protected $table = 'classes';

    // Si vous avez des colonnes qui ne sont pas des timestamps
    protected $fillable = ['name', 'level'];
}
