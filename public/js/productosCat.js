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
            '<div class="col-sm-6 col-md-4">  <div class="thumbnail" >  <div class="row"> <div class="col-md-6 col-xs-6">'  + item.producto + 
            '</div> <div class="col-md-6 col-xs-6 "> <h3> <label> $'  + item.precio + 
            '</label></h3> </div> </div> <p>' + item.descripcion +
            '</p> </div> </div> ';   
        });

        trHTML += '</div>'
        $('#tbProductos').append(trHTML);
    });

}

