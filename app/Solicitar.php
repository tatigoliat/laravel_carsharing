<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitar extends Model
{
    protected $table = 'solicitudes';

    protected $fillable = [
        'pasajero_id', 'conductor_id', 'destino', 'distancia', 'tiempo_viaje', 'tiempo_recogida',
    ];
}
