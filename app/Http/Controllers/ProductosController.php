<?php

namespace App\Http\Controllers;

use App\productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{

	public function index()
	{
    	return view('productos.index');
	}

	public function getProductos(){
		
		$productos = productos::all();

		return $productos;
	}

	public function cancelRequisicion(){

		return view('/');
	}

}
