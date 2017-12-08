 <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 
 <?php $post = TCG\Voyager\Models\Post::first(); ?>
 <?php $categories = TCG\Voyager\Models\Category::first(); ?>
@extends('layouts.app')

@section('content')
<script src="{{asset('js/requisiciones.js')}}"></script>

        <div class="col-md-2 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" id="PerfilDiv">

                    <img src="storage/{{ Auth::user()->avatar }}" alt="Imagen Perfil" id="perfil"  >

                </div>

                
            </div>
        </div>

        <div class="col-md-8  " class="footerSolve">
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
                @can('edit', $post)
                  
                  <a href="{{ url('/productos') }}" type="button" class="btn btn-primary" >Nueva Requisicion</a>

                    <br>
                   <table class="table table-bordered" id="requisiciones">
                    <br>
                      <thead >
                        <tr >
                          <th>Requisicion</th>
                          <th>Estatus</th>
                        </tr>
                      </thead>

                    

                    </table>

                @endcan

                @can('edit', $categories)
               
                    <br>
                   <table class="table table-bordered" id="requisicionesFaltantes">
                    <br>
                      <thead >
                        <tr >
                          <th>Requisicion</th>
                          <th>Urgencia</th>
                          <th>Surtir</th>
                        </tr>
                      </thead>

                      

                    </table>


                @endcan

                </div>
            </div>
        </div>
   

@endsection
