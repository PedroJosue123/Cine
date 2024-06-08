<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public function Entrada(){
        return $this->HasOne(Entrada::class);
    }
}
