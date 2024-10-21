<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'item_id',
        'item_name',
        'quantity',
        'cost',
        'total_cost',
        'purchased_at',
    ];

   
public function user()
{
    return $this->belongsTo(User::class);
}

}
