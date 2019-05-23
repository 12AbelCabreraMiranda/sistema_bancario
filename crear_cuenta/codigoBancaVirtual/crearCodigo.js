$(document).ready(function(){

    //  -----------GUARDAR SOLICITUD ---------------
    $("#vista_cuenta").submit(registrarSolicitudVirtual)
    function registrarSolicitudVirtual(evento){
        evento.preventDefault()
        //alert("funciona");
      

        var datos = new FormData($("#vista_cuenta")[0])

        $("#respuestaSolicitudUsuarioVirtual").html("<img src='codigoBancaVirtual/cargando.gif' style='height:30px'> ")
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