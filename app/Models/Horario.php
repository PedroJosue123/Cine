<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    public function Sala(){
        return $this->belongsTo(Sala::class);
    }
    public function Pelicula(){
        return $this->belongsTo(Pelicula::class);
    }
    public function Entrada(){
        return $this->hasOne(Entrada::class);
    }
    
}
