<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cajas;
use App\almacenes;
class EntradaController extends Controller
{
    function index(){
    	return view('entradas.index');
    }
    function guardar(Request $request){
    	$respuesta = json_decode($request->getContent(), true);
    	foreach ($respuesta['data'] as $caja) {
    		$ncaja = new cajas;
			$ncaja->cantidad= $caja['cantidad'];
			$ncaja->almacen_id=$caja['almacen']['id'];
			$ncaja->producto_id = $caja['producto']['id'];
			$ncaja->fecha_caducidad = $caja['fecha_caducidad'];
			$ncaja->tonalidad = $caja['tonalidad'];
			$ncaja->olor = $caja['olor'];
			$ncaja->textura = $caja['textura'];
			$ncaja->save();	
    	}
    	$almacenes = almacenes::all();
        return $almacenes->first()->espacionDisponible();
    }
}
