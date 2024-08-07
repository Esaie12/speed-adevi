<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plateforme extends Model
{
    use HasFactory;
    protected $table = 'plateformes';

    protected $fillable = [
        'mode',
        "public_key",
        "private_key",
        'secret_key'
    ];
}
