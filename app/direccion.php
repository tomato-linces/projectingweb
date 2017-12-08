<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class direccion extends Model
{
    //
	protected $table = 'direcciones';

    protected $fillable = [
        'pais', 'estado', 'ciudad', 'colonia', 'numero', 'calle', 'cp'
    ];
}
