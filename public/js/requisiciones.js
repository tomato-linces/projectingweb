var Productos;
var Esta;
var user;


$(document).ready(function(){
   
   consultar();
  
    
    
});


function consultarRequisicion(){


    $.get('/getRequisicionEstado', function (data) {
        //success data
        //callback(data);
        Productos = data;
        var trHTML = '<tbody>';

        $.each(data, function (i, item)
        {   

            if(item.estado == 0){
                Esta="Pediente"

            }
            else{
                Esta="Aceptado"
            }
             trHTML += 
            '<tr><td>'  + item.id + 
            '</td><td>' + Esta + 
            '</td></tr>';     
        });

        trHTML += '</tbody>'
        $('#requisiciones').append(trHTML);
    });

}

function consultarRequisicionFaltantes(){


    $.get('/getRequisicionEstadoFaltantes', function (data) {
        //success data
        //callback(data);
        Productos = data;
        var trHTML = '<tbody>';

        $.each(data, function (i, item)
        {   

            if(item.estado == 0){
                Esta="No es urgente"

            }
            else{
                Esta="Es urgente"
            }
             trHTML += 
            '<tr><td>'  + item.id + 
            '</td><td>' + Esta + 
            '</td><td><a href="/productos" type="button" class="btn btn-primary" >Surtir</a> </td></tr>';     
        });

        trHTML += '</tbody>'
        $('#requisicionesFaltantes').append(trHTML);
    });

}

function consultar(){


    $.get('/getRequisicionEstadoConsulta', function (data) {
        //success data
        //callback(data);
        user = data;
        
       if(user.role_id == 3 || user.role_id == 1){
                consultarRequisicionFaltantes();

        }
        else if(user.role_id == 2 || user.role_id == 1){
                consultarRequisicion();
        }

    });

}



