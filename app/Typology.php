<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typology extends Model
{
    protected $table = 'typologies';

    public function packages(){
        return $this->hasMany('App\Package');
    }
}


