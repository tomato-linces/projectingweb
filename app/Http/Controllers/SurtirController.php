<?php

namespace App\Http\Controllers;

use App\requisicion;
use Illuminate\Http\Request;
use App\User;
class SurtirController extends Controller
{
     public function surtir(){
        return  view('surtir.surtir');
    }
    public function surtidas(){
        return  view('surtir.requisicionessurtidas');
    }
    public function pendientes(){
        return  view('surtir.requisicionespendientes');
    }
    public function index()
    {
       // return Requisiciones::all()->toJson();
        $res=array();
       $req =requisicion::all();
       foreach ($req as $value) {
            $user = User::find($value->usuario_id);
            $tabla = array();
            $tabla['id'] = $value->id;
            $tabla['nomre'] = $user->id;
            $tabla['empresa'] = $user->id;

            array_push($res,$tabla);
        }
        
        
        return  json_encode($res);

    }
}
