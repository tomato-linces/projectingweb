<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\requisicion;
use Illuminate\Support\Facades\Auth;



class RequisicionEstadoController extends Controller
{
    

	public function getRequisicionEstado(){
		$user = Auth::user();
		$requisicion = requisicion::select('id', 'estado') ->where('usuario_id',$user->id)->get();

		return $requisicion;
	}

	public function getRequisicionEstadoFaltantes(){
	
		$requisicion = requisicion::select('id', 'urgente') ->get();

		return $requisicion;
	}


	public function getRequisicionEstadoConsulta(){
	
		$user = Auth::user();

		return $user;
	}


}
 