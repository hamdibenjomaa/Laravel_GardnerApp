<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Item extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'cost',
        'provider_id',
        'photo',
        'availability',
        'stock', 
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class); 
    }
}
