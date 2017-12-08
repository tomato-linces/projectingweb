<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bodega;
class PruebasController extends Controller
{
    function prueba(){
    	$bodega = bodega::find(1);
    	return $bodega->inferior();
    }
}
