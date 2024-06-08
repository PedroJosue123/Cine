<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;
    public function Horario(){
        return $this->hasOne(Horario::class);
    }
}
