<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class direccion extends Model
{
    //
    protected $fillable = [
        'pais', 'estado', 'ciudad', 'colonia', 'número', 'calle', 'cp'
    ];
}
