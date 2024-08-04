<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrancheStatus extends Model
{
    use HasFactory;
    protected $table = 'tranche_status';

    protected $fillable = [
        'title',
        'icon',
        'color',
    ];

}
