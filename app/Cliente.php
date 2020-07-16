<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function transferencias(){
        return $this->hasMany('App\Transferencia');
    }
}
