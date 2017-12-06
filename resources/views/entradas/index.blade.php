@extends('layouts.app')

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
	<label>calificacion Tonalida: </label>
	<select class="form-control" name="tonalidad" ng-model="actual.tonalidad">
		<option value=1>1</option>
		<option value=2>2</option>
		<option value=3>3</option>
	</select>
	<label>calificacion Olor: </label>
	<select class="form-control" name="olor" ng-model="actual.olor">
		<option value=1>1</option>
		<option value=2>2</option>
		<option value=3>3</option>
	</select>
	<label>calificacion Textura: </label>
	<select class="form-control" name="textura" ng-model="actual.textura">
		<option value=1>1</option>
		<option value=2>2</option>
		<option value=3>3</option>
	</select>
	
	<button ng-click="agregarEntrada()">Cargar</button>
	<div class="table-responsive">
		<table class="table table-striped">
			<th>
				Producto
			</th>
			<th>
				Almacen
			</th>
			<th>
				Cantidad
			</th>
			<th>
				Fecha de caducidad
			</th>
			<th>
				Tonalidad
			</th>
			<th>
				Olor
			</th>
			<th>
				Textura
			</th>
			<th></th>
			<tr ng-repeat = "ent in lista">
				<td>-_ent.producto.producto_-</td>
				<td>-_ent.almacen.nombre_-</td>
				<td>-_ent.cantidad_-</td>
				<td>-_ent.fecha_caducidad_-</td>
				<td>-_ent.tonalidad_-</td>
				<td>-_ent.olor_-</td>
				<td>-_ent.textura_-</td>
				<td> <button ng-click = "eliminarEntrada(ent)">X</button> </td>
			</tr>
		</table>
	</div>
	<button ng-click = "guardar()"> Guardar </button>
</div>

@endsection