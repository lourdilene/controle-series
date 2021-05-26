<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];

    public function seasons(){
        return $this->hasMany(Season::class);
    }

    public function serie(){
        return $this->belongsTo(Serie::class);
    }
}