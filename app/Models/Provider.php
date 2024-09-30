<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = ['name', 'email', 'phone_number', 'address' ,'description', 'photo'];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}

