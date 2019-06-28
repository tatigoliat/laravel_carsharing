<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Automovil extends Model
{
    protected $table = 'automoviles';

    protected $fillable = [
        'modelo', 'placa', 'plazas', 'user_id',
    ];
}
