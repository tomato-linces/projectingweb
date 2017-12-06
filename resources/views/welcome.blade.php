<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
<link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
@extends('layouts.app')

<!-- Agrega el app.blade.php para que la barrita de menú aparezca en todos lados -->
@section('content') 

<main role="main" class="container" >
    
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                    <div class="item active">
                      <img src="img/tomates.jpg" alt="Tomates" style="height:400px;">
                       <div class="carousel-caption">
                            <h3>Tomates Cherry</h3>
                            <p>Una nueva cosecha de tomate cherry en espera de su venta</p>
                        </div>
                    </div>

                    <div class="item">
                      <img src="img/tomate-empleado.jpg" alt="Empleados de tomate" style="height:400px;">
                        <div class="carousel-caption">
                            <h3>Nuestros Empleados</h3>
                            <p>Trabajan duro dia a dia para obtener los mejores resultados</p>
                        </div>
                    </div>

                    <div class="item">
                      <img src="img/especialistas-tomate.jpg" alt="Campo de tomates" style="height:400px;">
                      <div class="carousel-caption">
                            <h3>Nuevas Cosechas</h3>
                            <p>La temporada de tomates ya va ha llegar</p>
                        </div>
                    </div>
                  </div>

                  <!-- Left and right controls -->
                  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
         
      
        </div>
           
    </div>

    <div class="col-md-12">

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div align="center">
                         <img src="img/icon-empresa.png" class="img-circle" alt="icono empresa" > 
                    </div>
                    <br>
                    <div align="center">
                        <h2>Nosotros</h2>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.
                    </div>  
                    <br> 
                    <div class="col-md-8 col-md-offset-2" align="center">
                    <br>
                        <a href="{{ route('home') }}" type="button" class="btn btn-primary" >Ver más</a>
                    </div>
                </div>
                
            </div>
        </div>


        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div align="center">
                        <img src="img/icon-tomate.png" class="img-circle" alt="icono tomate" > 
                    </div>
                    <br>
                    <div align="center">
                        <h2>Productos</h2>
                    </div>
                    <div class="col-md-8 col-md-offset-2"> <!-- bg-info text-white -->
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.
                    </div>  
                    <br> 
                    <div class="col-md-8 col-md-offset-2" align="center">
                    <br>
                        <a href="{{ route('home') }}" type="button" class="btn btn-primary" >Ver más</a>
                    </div>
                </div>
                
            </div>
        </div>


        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div align="center">
                       <img src="img/icon-empleados.png" class="img-circle" alt="icono empleados" > 
                    </div>
                    <br>
                    <div align="center">
                        <h2>Misión</h2>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.
                    </div>  
                    <br> 
                    <div class="col-md-8 col-md-offset-2" align="center">
                    <br>
                        <a href="{{ route('home') }}" type="button" class="btn btn-primary" >Ver más</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

</main> 


@endsection