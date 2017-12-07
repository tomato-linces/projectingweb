
@extends('layouts.app')

@section('content') 

<script src="{{asset('js/productosCat.js')}}"></script>

<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">

        <div class="panel-heading" align="center">
            <strong>Productos</strong> 
        </div>

        <div class="panel-body" id="tbProductos">
                  
      
                   
        </div>
    </div>
</div>


@endsection