<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transferencia extends Model
{
    public function cliente(){
        return $this->belongsTo('App\Cliente');
    }
}
