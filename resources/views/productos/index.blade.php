<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
<link href="{{ asset('css/compra.css') }}" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
 <?php $post = TCG\Voyager\Models\Post::first(); ?>

@extends('layouts.app')
@can('edit', $post)

@section('content')
	<script src="{{asset('js/productos.js')}}"></script>

	<div class="container" id="panelDatos" style="display: none">
		
		<div class="panel panel-danger">
			<div class="panel-heading"><h2>Datos de envio</h2></div>

			<div class="panel-body">
				<form>
					
					<div class="form-row col-md-12">
						<div class="form-group col-sm-6">
							<label class="col-form-label" for="txtUsuario">Usuario</label>
							<div class="col-10">
								<input type="text" class="form-control" id="txtUsuario" value="{{ Auth::user()->name }}" readonly />
							</div>
						</div>

						<div class="form-group col-sm-6">
							<label class="col-form-label" for="cbxUrgente">Pedido Urgente</label>
							<div class="col-10">
								<select class="form-control" id="cbxUrgente">
									<option value="0">No</option>
									<option value="1">Si</option>
						    	</select>
							</div>
						</div>
					</div>
					
					<div class="form-row col-md-12">
						<div class="form-group col-sm-6">
							<label class="col-form-label" for="cbxRegion">Región</label>
							<div class="col-10">
								<select class="form-control" id="cbxRegion">
									<option value="-1">Seleccione una Región</option>
							    	<option value="1">México</option>
							    	<option value="2">Estados Unidos de America</option>
							     	<option value="3">Unión Europea</option>
							     	<option value="4">Asia</option>
						    	</select>
							</div>
						</div>

						<div class="form-group col-sm-6">
							<label class="col-form-label" for="cbxPais">Pais</label>
							<div class="col-10">
								<select class="form-control" id="cbxPais">
									<option value="-1">Seleccione un País</option>
						    	</select>
							</div>
						</div>
					</div>

					<div class="form-row col-md-12">
						<div class="form-group col-sm-6">
							<label class="col-form-label" for="cbxEstado">Estado</label>
							<div class="col-10">
								<select class="form-control" id="cbxEstado">
									<option value="-1">Seleccione un Estado</option>
						    	</select>
							</div>
						</div>

						<div class="form-group col-sm-6">
							<label class="col-form-label" for="cbxCiudad">Ciudad</label>
							<div class="col-10">
								<select class="form-control" id="cbxCiudad">
									<option value="-1">Seleccione un Ciudad</option>
						    	</select>
							</div>
						</div>
					</div>

					<div class="form-row col-md-12">
						<div class="form-group col-sm-6">
							<label class="col-form-label" for="txtCalle">Calle</label>
							<div class="col-10">
								<input type="text" class="form-control" id="txtCalle" />
							</div>
						</div>

						<div class="form-group col-sm-3">
							<label class="col-form-label" for="txtNumero">Número</label>
							<div class="col-10">
								<input type="number" class="form-control" id="txtNumero" />
							</div>
						</div>
						<div class="form-group col-sm-3">
							<label class="col-form-label" for="txtCP">Código Postal</label>
							<div class="col-10">
								<input type="number" class="form-control" id="txtCP" />
							</div>
						</div>
					</div>

					<div class="form-row col-md-12">
						<div class="form-group col-sm-12">
							<div class="col-10">
								<button type="submit" class="btn btn-success pull-right" id="btnFinalizar">Finalizar Requisición</button>
							</div>
						</div>
					</div>
					
				</form>
			</div>
		</div>

	</div>


	<div class="container" id="panelProductos">
	  
		<div class="panel panel-danger">
			<div class="panel-heading"><h2>Agregar productos a la requisición</h2></div>

			<div class="panel-body">
				
				<div class="form-row col-md-12">
					<div class="form-group col-sm-12">
						<div class="col-10">
							<a class="btn btn-danger pull-right" href="{{ url('/') }}" id="btnCancelar">Cancelar Requisición</a>
						</div>
					</div>
				</div>

				<div class="col-md-12" id="panelHide">

			    <h3>Productos</h3>
			    
			    <table class="table table-hover" id="tbProductos">
			      
			      <thead>
			        <tr>
			          <th>ID</th>
			          <th>Producto</th>
			          <th>Descripción</th>
			          <th>Precio</th>
			          <th>Cantidad</th>
			          <th>Agregar</th>
			        </tr>
			      </thead>


			    </table>

			  </div>
			  
				<div class="col-md-12">
			    
				    <h3>Productos Requisición</h3>
				    
				    <table class="table table-hover">
				      
				      <thead>
				        <th>ID</th>
				        <th>Producto</th>
				        <th>Descripción</th>
				        <th>Precio</th>
				        <th>Cantidad</th>
				        <th>Total</th>
				        <th>Eliminar</th>
				      </thead>

				      <tbody id="tbLineas">
				      </tbody>

				    </table>

				    <span class="text-center" id="txtNoItem">
				      No tiene productos seleccionados
				    </span>

					<div class="form-row col-md-12">
						<div class="form-group col-sm-2">
							<button class="btn pull-left btn-danger col-sm-12" id="btnRemove">Remover productos</button>
						</div>
						<div class="form-group col-sm-2">
							<button class="btn pull-left btn-success col-sm-12" id="btnContinuar">Continuar</button>
						</div>
					</div>
				    
				</div>
			</div>
		</div>
	</div> <!-- End container Productos -->

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