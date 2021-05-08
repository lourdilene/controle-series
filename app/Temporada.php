<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    public function episodios(){
        return $this->hasMany(Episodio::class);
    }
}
