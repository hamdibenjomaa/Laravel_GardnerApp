<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;
    protected $fillable = ['reclamation_id', 'message'];

    // Belongs to Reclamation
    public function reclamation()
    {
        return $this->belongsTo(Reclamation::class);
    }
}
