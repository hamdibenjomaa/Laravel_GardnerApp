<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    use HasFactory;

    protected $fillable = [
    'title', 
    'description',
    'user_id'
    ];

    // One-to-Many relationship with Response
    public function responses()
    {
        return $this->hasMany(Response::class);
    }
    public function user()
{
    return $this->belongsTo(User::class);
}
}
