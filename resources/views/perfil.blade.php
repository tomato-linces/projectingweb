 <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@extends('layouts.app')

@section('content')


    
        <div class="col-md-2 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" id="PerfilDiv">

                    <img src="storage/{{ Auth::user()->avatar }}" alt="Imagen Perfil" id="perfil"  >

                </div>

                <div class="panel-body" align="center">
                  
                    <a href="{{ url('/tomate') }}" type="button" class="btn btn-primary" >Editar Perfil</a>
                    
                </div>
            </div>
        </div>

        <div class="col-md-8  ">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <br>
                    <strong>Nombre :</strong> {{ Auth::user()->name }}
                    <br>
                    <br>
                    <strong>Email :</strong> {{ Auth::user()->email }}
                    <br>
                    <br>
                    <strong>Empresa :</strong>  {{ Auth::user()->empresa }}
                    <br>
                    <br>
                </div>

                <div class="panel-body" align="right">
                  
                  <a href="{{ url('/productos') }}" type="button" class="btn btn-primary" >Nueva Requisicion</a>

                    <br>
                   <table class="table table-bordered" >
                    <br>
                      <thead >
                        <tr >
                          <th>Requisicion</th>
                          <th>Estatus</th>
                        </tr>
                      </thead>

                      <tbody>
                        
                          <tr>
                            <td>  </th>
                            <td>  </th>
                          </tr>
                       
                      </tbody>

                    </table>

                </div>
            </div>
        </div>
    

@endsection
