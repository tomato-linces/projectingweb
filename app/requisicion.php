<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class requisicion extends Model
{
    //
	protected $table = 'requisiciones';

	protected $fillable = [
        'usuario_id', 'region', 'direccion_id', 'total', 'estado', 'urgente'
    ];
}
