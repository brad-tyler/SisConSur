<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacient extends Model
{
    use HasFactory;

    protected $fillable = ['dni', 'name', 'surname', 'sexo'];
    
    public function pruebas()
    {
        return $this->hasMany(Prueba::class);
    }
}
