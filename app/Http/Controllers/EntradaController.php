<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cajas;
use App\bodega;
class EntradaController extends Controller
{
    function index(){
    	return view('entradas.index');
    }
    function guardar(Request $request){
    	$respuesta = json_decode($request->getContent(), true);
        $reporte = cajas::ingresarCajas($respuesta['data']);
        return json_encode($reporte);
    }
}
