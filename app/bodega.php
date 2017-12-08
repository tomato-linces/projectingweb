<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\cajas;
class bodega extends Model
{
	protected $table = 'bodegas';
	function espacioDisponible(){
		return $this->capacidad - $this->cajas()->count();
    }
     public function cajas()
    {
        return cajas::where('bodega_id',$this->id)->get();
    }
    public function inferior(){
    	$bodegas = bodega::where('nivel', '<'  , $this->nivel)->orderBy('nivel', 'desc')->get();
    	if ($bodegas->count()==0)
    		return $this;
    	$bodega = $bodegas->first();
    	if ($bodega->espacioDisponible() == 0)
    		$bodega = $bodega->inferior();
    	return $bodega;
    }
}
