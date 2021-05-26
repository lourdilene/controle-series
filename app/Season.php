<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Season extends Model
{
    protected $fillable = ['number'];
    public $timestamps = false;

    public function episodes(){
        return $this->hasMany(Episode::class);
    }

    public function getWatchEpisodes() : Collection {
        return $this->episodes->filter( function(Episode $episode){
            return $episode->watch;
        });
    }
}
