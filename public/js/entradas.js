  var app = angular.module("tomate");
  app.controller("entrada", function($scope,$http) {
      $scope.productos = [];
      $scope.almacenes = [];
      $scope.lista = [];
      $scope.actual = "";
      $scope.cantidad =0;

      $scope.cargarProductos = function(){
        $http.get("/productos/getProductos")
        .success(function(data){
          console.log(data);
            $scope.productos =  data;
        })
        .error(function(data){
          console.log(data);
        });    
      }
	    $scope.cargarAlmacenes = function(){
        $http.get("/almacenes")
        .success(function(data){
          console.log(data);
            $scope.almacenes =  data;
        })
        .error(function(data){
          console.log(data);
        });    
      } 
      $scope.agregarEntrada=function(){
        var fecha = new Date($scope.actual.fecha_caducidad);
        $scope.lista.push({producto:$scope.actual.producto,
                            cantidad:1,
                            almacen:$scope.actual.almacen,
                            fecha_caducidad:""+fecha.getFullYear()+(fecha.getMonth()+1)+fecha.getDate(),
                            tonalidad:$scope.actual.tonalidad ,
                            olor:$scope.actual.olor ,
                            textura:$scope.actual.textura
                          });
        $scope.actual = "";
        console.log($scope.lista);
        $('#myModal').modal('toggle');
      }
      $scope.eliminarEntrada = function(val){
        var index = $scope.lista.indexOf(val);
        if (index >= 0) {
          $scope.lista.splice( index, 1 );
        }
      }
      $scope.guardar = function (){
         $http.post('/Entradas/guardar', {data:$scope.lista})
            .success(function (data) {
              console.log("bien");
              console.log(data);
            })
            .error(function (data) {
              console.log("mal");
              console.log(data);
            });
      }
      function init(){
        $scope.cargarProductos();  
        $scope.cargarAlmacenes();
      }
      init();
      
  });