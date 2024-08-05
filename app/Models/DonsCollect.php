<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonsCollect extends Model
{
    use HasFactory;

    protected $table = "dons_collects";

    protected $fillable =[
        'user_id',
        'don_id',
        'amount',
        'transaction_id',
        'anonyme'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
