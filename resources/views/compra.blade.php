<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
<link href="{{ asset('css/compra.css') }}" rel="stylesheet">

@extends('layouts.app')

@section('content')

<div class="container" ng-app="myApp" ng-controller="myCtrl">
  
  <div class="col-md-6">
    <h2>Productos</h2>
    
    <table class="table table-hover">
      
      <thead>
        <tr>
          <th>ID</th>
          <th>Producto</th>
          <th>Descripción</th>
          <th>Precio</th>
          <th>Agregar</th>
        </tr>
      </thead>

      <tbody>
        @foreach($productos as $producto)
          <tr>
            <td> {{ $producto->id }} </th>
            <td> {{ $producto->producto }} </th>
            <td> {{ $producto->descripcion }} </th>
            <td> {{ $producto->precio }} </th>
            <td> BOTON </th>
          </tr>
        @endforeach
      </tbody>

    </table>

  </div>
  
  <div class="col-md-6">
    
    <h2>Productos Requisición</h2>
    
    <table class="table table-hover">
      
      <thead>
        <th>ID</th>
        <th>Producto</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Total</th>
      </thead>

      <tbody id="ok">
      </tbody>

    </table>

    <span class="text-center" ng-show="myItems.length == 0">
      No tienes productos seleccionados
    </span>

    <div class="clearfix"></div>

    <button ng-click="removeBasket()" ng-show="myItems.length > 0" class="pull-left alert alert-danger">Remover productos</button>
  </div>
  
</div>

@endsection

<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
<script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.2/angular.min.js'></script>

<script >var app = angular.module('myApp', []);

app.controller('myCtrl', function($scope) {
  
  //ürünler - products
  $scope.items = [
    {
      id: 1,
      name: 'iPhone 6s',
      price: 2500
    },
    {
      id: 2,
      name: 'television',
      price: 8950
    },
    {
      id: 3,
      name: 'Macbook Pro',
      price: 4000
    },
    {
      id: 4,
      name: 'T-shirt',
      price: 20
    },
    {
      id: 5,
      name: 'C# Book',
      price: 10
    },
    {
      id: 6,
      name: 'Notebook',
      price: 6980
    }
  ];
  
  //sepetim - my shopping cart
  $scope.myItems = [];
  //sepete ekle - add to cart
  $scope.addItem = function(newItem) {
    if($scope.myItems.length == 0) {
      newItem.count = 1;
      $scope.myItems.push(newItem);
    }else {
      var repeat = false;
      for( var i = 0; i < $scope.myItems.length; i++ ) {if (window.CP.shouldStopExecution(1)){break;}
        if($scope.myItems[i].id == newItem.id) {
          $scope.myItems[i].count++;
          repeat = true;
        }
      }
window.CP.exitedLoop(1);

      if(!repeat) {
        newItem.count = 1;
        $scope.myItems.push(newItem);
      }
    }
    updatePrice();
  };
  
  //fiyatı güncelle (totalPrice) - update price
  var updatePrice = function() {
    var totalPrice = 0;
    for( var i = 0; i < $scope.myItems.length; i++ ) {if (window.CP.shouldStopExecution(2)){break;}
      totalPrice += ($scope.myItems[i].count) * ($scope.myItems[i].price);
    }
window.CP.exitedLoop(2);

    $scope.totalPrice = totalPrice;
  };
  
  //sepeti boşalt - empty your cart
  $scope.removeBasket = function() {
    $scope.myItems.splice(0, $scope.myItems.length);
    updatePrice();
  };
  
});

app.filter('reverse', function() {
  return function(items) {
    var x = items.slice().reverse();
    if( items.length > 1 ) {
      angular.element('#ok tr').css('background','#fff');
      angular.element('#ok tr').filter(':first').css('background','lightyellow');
      setTimeout(function() {
        angular.element('#ok tr') .filter(':first').css('background','#fff');
      }, 500);
    }
    return x;
  };
});

//# sourceURL=pen.js
</script>