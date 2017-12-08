<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\cajas;
class bodega extends Model
{
	protected $table = 'bodegas';
	function espacionDisponible(){
		return $this->capacidad - $this->cajas()->count();
    }
     public function cajas()
    {
        return cajas::where('almacen_id',$this->id)->get();
    }
}
