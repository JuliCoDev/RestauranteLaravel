<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    //
    public function reservas()
    {
        return $this->hasMany('App\Reserva');
    }
}
