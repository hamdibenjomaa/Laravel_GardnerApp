<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $fillable = ['formation_id', 'numero', 'email'];

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
}
