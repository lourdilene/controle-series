<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $fillable = ['number'];
    public $timestamps = false;

    public function season(){
        return $this->belongsTo(Season::class);
    }
}
