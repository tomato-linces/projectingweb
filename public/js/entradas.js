  var app = angular.module("tomate");
  app.controller("entrada", function($scope,$http) {
      $scope.productos = [];
      $scope.bodegas = [];
      $scope.lista = [];
      $scope.actual = "";
      $scope.cantidad =0;
      $("#ventana2").hide();
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
	    $scope.cargarBodegas = function(){
        $http.get("/bodegas")
        .success(function(data){
          console.log(data);
            $scope.bodegas =  data;
        })
        .error(function(data){
          console.log(data);
        });    
      } 
      $scope.agregarEntrada=function(){
        var fecha = new Date($scope.actual.fecha_caducidad);
        if($scope.actual.producto==undefined||$scope.actual.cantidad==undefined||$scope.actual.bodega==undefined||$scope.actual.fecha_caducidad == undefined){
          alert("Verifique que los datos sean correctos antes de añadir");
          return;
        }
        $scope.lista.push({producto:$scope.actual.producto,
                            cantidad:$scope.actual.cantidad,
                            bodega:$scope.actual.bodega,
                            fecha_caducidad:""+fecha.getFullYear()+(fecha.getMonth()+1)+fecha.getDate()
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
        if($scope.lista.length == 0){
          alert("Seleciona almenos una entrada para continuar");
          return;
        }
         $http.post('/Entradas/guardar', {data:$scope.lista})
            .success(function (data) {
              console.log("bien");
              console.log(data);
              $scope.respuesta = data;
              $("#ventana1").hide(1000);
              $("#ventana2").show(1000);
              
            })
            .error(function (data) {
              console.log("mal");
              console.log(data);
            });
      }
      function init(){
        $scope.cargarProductos();  
        $scope.cargarBodegas();
        $scope.actual.cantidad = 1;
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();
        if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} today = mm+'/'+dd+'/'+yyyy;
        $scope.actual.fecha_caducidad = today;
      }
      init();
      
  });