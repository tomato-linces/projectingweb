<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class linea extends Model
{
    //

    protected $fillable = [
        'cantidad', 'subtotal', 'producto_id', 'requisicion_id'
    ];
}
