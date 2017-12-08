<?php $categories = TCG\Voyager\Models\Category::first(); ?>
@extends('layouts.app')

@can('edit', $categories)

@section('content')
<script type="text/javascript" src="{{ asset('js/entradas.js') }}"></script>
<div class="container" ng-controller = "entrada">
	<div class="jumbotron">
	  <h1>Entrada de Producto</h1> 
	  <p>Ingrese la entrada del producto en cajas...</p> 
	</div>
	<label>Almacen: </label>
	<select ng-model="actual.almacen" class="form-control" ng-options="x.nombre for x in almacenes">
	</select>
	<label>Producto: </label>
	<select ng-model="actual.producto" class="form-control" ng-options="x.producto for x in productos">
	</select>
	<label>Cantidad: </label>
	<input type="number" class="form-control" name="cantidad" ng-model="actual.cantidad">
	<label>Fecha de caducidad: </label>
	<input type="date" class="form-control" name="fecha_caducidad" min="2000-01-02" ng-model="actual.fecha_caducidad">
	
	
	<button ng-click="agregarEntrada()">Cargar</button>
	<div class="table-responsive">
		<table class="table table-striped">
			<th>
				Producto
			</th>
			<th>
				Bodega
			</th>
			<th>
				Cantidad
			</th>
			<th>
				Fecha de caducidad
			</th>
			<th></th>
			<tr ng-repeat = "ent in lista">
				<td>-_ent.producto.producto_-</td>
				<td>-_ent.almacen.nombre_-</td>
				<td>-_ent.cantidad_-</td>
				<td>-_ent.fecha_caducidad_-</td>
				<td> <button ng-click = "eliminarEntrada(ent)">X</button> </td>
			</tr>
		</table>
	</div>
	<button ng-click = "guardar()"> Guardar </button>
</div>

@endsection

@else
        @section('content')
            <main role="main" class="container" >
    
                <div class="col-md-8 col-md-offset-2" >
                    <div class="panel panel-default"  align="center" >
                        <h2>Lo sentimos pero no tiene permiso para estar aqui</h2>
                        <img src="img/denegado.png" alt="Tomates"  id="imgNotPermission" >
                    </div>
                </div>
            </main>
        @endsection
       

@endcan