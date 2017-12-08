var Productos;


$(document).ready(function(){

    var url = "/catalogo/";
    
    consultarProductos();
});


function consultarProductos(){

    $.get('/catalogo/getProductosCat', function (data) {
        //success data
        //callback(data);
        Productos = data;
        var trHTML = '<div >';

        $.each(data, function (i, item)
        {   
            trHTML += 
            '<div class="col-sm-6 col-md-4">  <div class="thumbnail" >  <img src="data:image/jpg;base64,'+item.imagen+'" alt="" style="height:300px;" /> <div class="row"> <div class="col-md-6 col-xs-6"><h3>'  + item.producto + 
            '</h3></div> <div class="col-md-6 col-xs-6 "> <h3> <label> $'  + item.precio + 
            '/'+item.cantidad+'Kg</label></h3> </div> </div> <p>' + item.descripcion +
            '</p> </div> </div> ';   
        });

        trHTML += '</div>'
        $('#tbProductos').append(trHTML);
    });

}


