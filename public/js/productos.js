var Productos;
var Requisicion = {};

$(document).ready(function(){

    var url = "/productos/";
    $('#btnRemove').hide();
    $('#btnContinuar').hide();
    $('#spanTotal').hide();

    consultarProductos();

    $('#btnRemove').on('click', function(e){
        e.preventDefault();

        Requisicion = {};

        $('#tbLineas').empty();
        $('#btnRemove').hide();
        $('#btnContinuar').hide();
        $('#spanTotal').text('Total: $');
        $('#spanTotal').hide();
        $('#txtNoItem').show();

        $('#panelHide').show('slow');
        $('#btnFinalizar').attr('disabled', 'true');

    });

    $('#btnContinuar').on('click', function(e){
        e.preventDefault();

        $('#panelHide').hide('slow');
        $('#btnContinuar').hide();
        $('#panelDatos').show('slow');
        $('#cbxUrgente').focus();
    });

    $('#btnFinalizar').on('click', function(e){
        e.preventDefault();

        saveData();
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

    var lineaRequisicion = {};

    var iCant = $('#inpCant'+iValue).val();
    var trHTML = '';    
    var exist = false;

    lineaRequisicion['cantidad'] = parseFloat(iCant);
    lineaRequisicion['subtotal'] = parseFloat(iCant * Productos[iValue - 1].precio);
    lineaRequisicion['producto_id'] = Productos[iValue - 1].id;

    //Se guarda la linea de requisición en la requisición
    Requisicion[iValue] = lineaRequisicion;
    //console.log(Requisicion);

    table = document.getElementById("tbLineas");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0].innerHTML;
        
        if(td == iValue){
            exist = true;
            var cantidad = tr[i].getElementsByTagName("td")[4];
            var total = tr[i].getElementsByTagName("td")[5];
            
            lineaRequisicion['cantidad'] = lineaRequisicion['cantidad'] + parseFloat(cantidad.innerHTML);
            lineaRequisicion['subtotal']    = lineaRequisicion['subtotal'] + parseFloat(total.innerHTML);

            cantidad.innerHTML = lineaRequisicion['cantidad'];
            total.innerHTML = lineaRequisicion['subtotal'];
        }
         
    }

    //Si la linea de requisición no existia se agrega.
    if(!exist){
        trHTML += '<tr>';
        trHTML += '<td>'+lineaRequisicion.producto_id+'</td>';
        trHTML += '<td>'+Productos[iValue - 1].producto+'</td>';
        trHTML += '<td>'+Productos[iValue - 1].descripcion+'</td>';
        trHTML += '<td>'+Productos[iValue - 1].precio+'</td>';
        trHTML += '<td>'+lineaRequisicion.cantidad+'</td>';
        trHTML += '<td>'+lineaRequisicion.subtotal+'</td>';
        trHTML += '</td><td><button class="btn btn-sm btn-danger" onclick="deleteLinea(this)" value='+ lineaRequisicion.producto_id +'>x</button>';
        trHTML += '</tr>';

        $('#tbLineas').append(trHTML);

        $('#txtNoItem').hide();
        $('#btnRemove').show();
        $('#btnContinuar').show();
        $('#spanTotal').show();
    }

    $('#spanTotal').text('Total: $' + getTotal());
}

function deleteLinea(btnDelete){

    var iValue = $(btnDelete).val();

    table = document.getElementById("tbLineas");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0].innerHTML;
        
        if(td == iValue){
            document.getElementById("tbLineas").deleteRow(i);
            
            delete Requisicion[iValue];

            if($('#tbLineas').get(0).childElementCount < 1){

                $('#btnRemove').hide();
                $('#btnContinuar').hide();
                $('#txtNoItem').show();
                $('#spanTotal').text('Total: $');
                $('#spanTotal').hide();
                $('#btnFinalizar').attr('disabled', 'true');
                $('#panelHide').show('slow');
            }
        }
    }

    $('#spanTotal').text('Total: $' + getTotal());

}

function getTotal(){

    var totalRequisicion = 0;

    $.each(Requisicion, function (i, item){

        totalRequisicion += Requisicion[i].subtotal;

    });

    //console.log(totalRequisicion);
    return totalRequisicion;
}

function saveData(){

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        var idUser  = $('#txtIdUser').val();
        var bUrgente = $('#cbxUrgente').val();
        var sRegion = $('#cbxRegion').val();

        var sPais       = $('#cbxPais').val();
        var sEstado     = $('#cbxEstado').val();
        var sCiudad     = $('#cbxCiudad').val();
        var sCalle      = $('#txtCalle').val();
        var iNumero     = $('#txtNumero').val();
        var sColonia    = $('#txtColonia').val();
        var iCodigoPost = $('#txtCP').val();

        var iTotal = $('#spanTotal').text().split("$")[1];

        //Guardar la dirección
        $.post('/requisiciones/saveDireccion',{'pais':sPais,
                                               'estado': sEstado,
                                               'ciudad': sCiudad,
                                               'colonia': sColonia,
                                               'numero': iNumero,
                                               'calle': sCalle,
                                               'cp': iCodigoPost,
                                                _token: CSRF_TOKEN} ,
                                                function (data) {

            var idDireccion = data;
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.post('/requisiciones/saveRequisicion',{'usuario_id':idUser,
                                               'region': sRegion,
                                               'direccion_id': idDireccion,
                                               'total': iTotal,
                                               'estado': 0,
                                               'urgente': bUrgente,
                                                _token: CSRF_TOKEN} ,
                                                function (data) {

                var idRequisicion = data;

                $.each(Requisicion, function (i, item)
                {  
                    item['requisicion_id'] = idRequisicion;
                }); 

                //console.log(Requisicion);
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                
                $.post('/requisiciones/saveLineas', {Requisicion,
                                                _token: CSRF_TOKEN},
                                                function (data) {

                        var success = data;

                });

            });

        });

}