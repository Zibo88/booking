<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    public function typology(){
        return $this->belongsTo('App\Typology');
    }

    public function apartment(){
        return $this->belongsTo('App\Apartment');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    protected $dates = [
        'departure',
        'return',
    ];
}
