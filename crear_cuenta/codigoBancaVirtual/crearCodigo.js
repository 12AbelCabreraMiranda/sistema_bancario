$(document).ready(function(){

    //  -----------GUARDAR SOLICITUD ---------------
    $("#vista_cuenta").submit(registrarSolicitudVirtual)
    function registrarSolicitudVirtual(evento){
        evento.preventDefault()
        //alert("funciona");
      

        var datos = new FormData($("#vista_cuenta")[0])

        
          $.ajax({
              url: 'codigoBancaVirtual/generate.php',// variablePHP
              type: 'POST',
              data: datos,
              contentType: false,
              processData: false,
              success: function(datos){
                  $("#respuestaSolicitudUsuarioVirtual").html(datos)                  
              }
          })  
          
          $.ajax({
            url: 'codigoBancaVirtual/welcome.php',// variablePHP
            type: 'POST',
            data: datos,
            contentType: false,
            processData: false,
            success: function(datos){
                $("#respuestaSolicitudUsuarioVirtual").html(datos)                  
            }
        })
    }

})