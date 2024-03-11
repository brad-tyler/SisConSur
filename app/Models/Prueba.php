<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prueba extends Model
{
    use HasFactory;

    public function pacient()
    {
        return $this->belongsTo(Pacient::class);
    }

    public function tamizaje()
    {
        return $this->belongsTo(Tamizaje::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
