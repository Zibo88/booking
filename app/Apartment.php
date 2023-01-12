<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $table = 'apartments';

    public function packages(){
        return $this->hasMany('App\Package');
    }
}
