@extends('layouts.app')

@section('content')
 <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
<script>
  var app = angular.module("tomate", [], function($interpolateProvider) {
          $interpolateProvider.startSymbol('-_');
          $interpolateProvider.endSymbol('_-');
      });

  var app = angular.module("tomate");
  app.controller("requisition", function($scope,$http) {
      $scope.h = "hola";
      $scope.requis = [];
      $scope.actual = "";
      $scope.cantidad =0;

      $scope.cargarProductos = function(){
        $http.get("/requisiciones")
        .success(function(data){
          console.log(data);
            $scope.requis =  data;
        })
        .error(function(data){
          console.log(data);
        });    
      }
      $scope.showRequi=function(val){
        console.log(val)
        $scope.actual=val;
        $("#myModal").modal();
      }
      $scope.addRequi=function(val){
        $scope.requis.push({product:val,cantidad:$scope.cantidad});
        $scope.cantidad = 0;
        $('#myModal').modal('toggle');
      }
      $scope.eliminarRequi = function(val){
        var index = $scope.requis.indexOf(val);
        if (index >= 0) {
          $scope.requis.splice( index, 1 );
        }
      }
      $scope.cargarProductos();
  });
</script>
<div ng-controller = "requisition">
  <div class="jumbotron text-center">
    <h1>Lista de requisiciones pendientes</h1>
    <p>En este panel se pueden validar, aceptar y administar las requisiciones de los clientes</p> 
  </div>
  
  <br><br>
  <div class = "container">
    <div class = "row">
    <div class = "col-sm-12">
      <table class="table table-striped">
      <thead>
        <tr>
          <th>Identificacion</th>
          <th>Cliente</th>
          <th>Empresa</th>
          <th>Precio</th>
          <th colspan="2"></th>
        </tr>
      </thead>
      <tbody>
        <tr ng-repeat = "requi in requis">
          <td>1</td>
          <td>luis</td>
          <td>luis</td>
          <td>$200</td>
          <td><button type="button" >Ver</button></td>
        </tr>
      </tbody>
    </table>
    </div>

  
  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Producto a comprar</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-6">
              <h1>
                -_ actual.nombre_-
              </h1>
              <p>-_actual.descripcion_-</p>
            </div>
            <div class="col-sm-6">
              <h1>cantidad:</h1><br>
              <input type="number" name="" ng-model="cantidad" min=0>
            </div>
          </div>
          
        </div>
      
      </div>

    </div>
  </div>
  </div>

</div>
@endsection
