var Productos;
var Requisicion = {};

$(document).ready(function(){

    var url = "/productos/";
    $('#btnRemove').hide();
    $('#btnContinuar').hide();

    consultarProductos();

    $('#btnRemove').on('click', function(e){
        e.preventDefault();

        Requisicion = {};

        $('#tbLineas').empty();
        $('#btnRemove').hide();
        $('#btnContinuar').hide();
        $('#txtNoItem').show();

    });

    $('#btnContinuar').on('click', function(e){
        e.preventDefault();

        $('#panelHide').hide('slow');
        $('#btnContinuar').hide();
        $('#panelDatos').show('slow');
    });

    $('#btnFinalizar').on('click', function(e){
        e.preventDefault();


    });

    $('#btnCancelar').on('click', function(e){
        //e.preventDefault();

        alert('¿Esta seguro que desea cancelar la requisición?');

        //$.get('/productos/cancelRequisicion', function () {});
    });

});

function consultarProductos(){

    $.get('/productos/getProductos', function (data) {
        //success data
        //callback(data);
        Productos = data;
        var trHTML = '<tbody>';

        $.each(data, function (i, item)
        {   
            trHTML += 
            '<tr><td>'  + item.id + 
            '</td><td>' + item.producto + 
            '</td><td>' + item.descripcion + 
            '</td><td>' + item.precio + 
            '</td><td><input class="small" id="inpCant'+item.id+'" type="number" value=0>' + 
            '</td><td><button class="btn btn-sm btn-primary" onclick="addLinea(this)" value='+ item.id +'>Agregar</button>' + 
            '</td></tr>';            
        });

        trHTML += '</tbody>'
        $('#tbProductos').append(trHTML);
    });

}

function addLinea(btnAdd){
    //Boton que fue precionado
    var iValue = $(btnAdd).val();

    var temp = Productos[iValue - 1];

    var iCant = $('#inpCant'+iValue).val();
    var trHTML = '';    
    var exist = false;

    temp['cantidad'] = parseFloat(iCant);
    temp['total'] = parseFloat(iCant * temp.precio);

    //Se guarda la linea de requisición en la requisición
    Requisicion['lineaR' + iValue] = temp;
    //console.log(Requisicion);

    table = document.getElementById("tbLineas");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0].innerHTML;
        
        if(td == iValue){
            exist = true;
            var cantidad = tr[i].getElementsByTagName("td")[4];
            var total = tr[i].getElementsByTagName("td")[5];
            
            temp['cantidad'] = temp['cantidad'] + parseFloat(cantidad.innerHTML);
            temp['total']    = temp['total'] + parseFloat(total.innerHTML);

            cantidad.innerHTML = temp['cantidad'];
            total.innerHTML = temp['total'];
        }
         
    }

    //Si la linea de requisición no existia se agrega.
    if(!exist){
        trHTML += '<tr>';
        trHTML += '<td>'+temp.id+'</td>';
        trHTML += '<td>'+temp.producto+'</td>';
        trHTML += '<td>'+temp.descripcion+'</td>';
        trHTML += '<td>'+temp.precio+'</td>';
        trHTML += '<td>'+temp.cantidad+'</td>';
        trHTML += '<td>'+temp.total+'</td>';
        trHTML += '</td><td><button class="btn btn-sm btn-danger" onclick="deleteLinea(this)" value='+ temp.id +'>x</button>';
        trHTML += '</tr>';

        $('#tbLineas').append(trHTML);

        $('#txtNoItem').hide();
        $('#btnRemove').show();
        $('#btnContinuar').show();
    }

    
}

function deleteLinea(btnDelete){

    var iValue = $(btnDelete).val();

    table = document.getElementById("tbLineas");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0].innerHTML;
        
        if(td == iValue){
            document.getElementById("tbLineas").deleteRow(i);
            
            if($('#tbLineas').get(0).childElementCount < 1){

                $('#btnRemove').hide();
                $('#btnContinuar').hide();
                $('#txtNoItem').show();
                $('#btnFinalizar').attr('disabled', 'true');
            }
        }
         
    }

}