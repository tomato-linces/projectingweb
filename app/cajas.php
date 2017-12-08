<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\bodega;
class cajas extends Model
{
    public static function ingresarCajas($cajas){
    	$icajas = [];
    	foreach ($cajas as $caja) {
    		for ($i = 1; $i <= $caja['cantidad']; $i++) {
    			$bodegaFinal = cajas::find($caja['bodega']['id']);
    			$bodegaDestino = $caja['bodega']['id'];
    			$bodega = bodega::find($bodegaDestino);
    			if($bodega->espacioDisponible()<=0){
    				$bodegaFinal = $bodega->inferior();
    				$bodegaDestino = $bodegaFinal->id;
    			}
    			$ncaja = new cajas;
				$ncaja->cantidad= 1;
				$ncaja->bodega_pertenece_id=$caja['bodega']['id'];
	            $ncaja->bodega_id=$bodegaDestino;
				$ncaja->producto_id = $caja['producto']['id'];
				$ncaja->fecha_caducidad = $caja['fecha_caducidad'];
				$ncaja->save();	
				$ncaja['bodega_pertenece'] = $caja['bodega']['nombre'];
				$ncaja['bodega_esta'] = $bodegaFinal->nombre;
				
				array_push ($icajas,$ncaja);
    		}
    	}
    	return $icajas;
    }
    

}
