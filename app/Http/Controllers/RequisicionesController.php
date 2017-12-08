<?php

namespace App\Http\Controllers;

use App\requisicion;
use App\linea;
use App\direccion;
use Illuminate\Http\Request;

class RequisicionesController extends Controller
{

	public function index()
	{
    	return view('productos.index');
	}

	public function saveRequisicion(Request $request){

		$requisicion = requisicion::create($request->all());
		$insertedId = $requisicion->id;

		return $insertedId;
	}

	public function saveLineas(Request $request){
    	
    	foreach ($request['Requisicion'] as $linea) {
    		$nlinea = new linea;
			$nlinea->cantidad = $linea['cantidad'];
			$nlinea->subtotal = $linea['subtotal'];
			$nlinea->producto_id = $linea['producto_id'];
			$nlinea->requisicion_id = $linea['requisicion_id'];
			
			if(!$nlinea->save()){
    			return -1;
			}
    	}

        return 1;
	}

	public function saveDireccion(Request $request){

		$direccion = direccion::create($request->all());

		$lastID = $direccion->id;

		return $lastID;
	}

}