<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\productos;

class CatalogoController extends Controller
{
    

    public function index()
	{
    	return view('catalogo');
	}

	public function getProductos(){
		
		$productos = productos::all();

		return $productos;
	}
}
 