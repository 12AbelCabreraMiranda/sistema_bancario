$(document).ready(function(){

    //  -----------GUARDAR SOLICITUD ---------------
    $("#formSolicitudTarjetaD").submit(solicitudTarjetaD)
    function solicitudTarjetaD(evento){
        evento.preventDefault()
              
        var datos = new FormData($("#formSolicitudTarjetaD")[0])
        var NoCuenta = $(".numCuentaCliente").text();//valorClass

        $("#respuestaSolicitado").html("<img src='solicitudTarjeta/cargando.gif' style='height:30px'> ")
          $.ajax({
            url: 'solicitudTarjeta/generate.php?CuentaCliente='+NoCuenta,// variablePHP
              type: 'POST',
              data: datos,
              contentType: false,
              processData: false,
              success: function(datos){
                  $("#respuestaSolicitado").html(datos)                  
              }
          })  
          
          $.ajax({
            url: 'solicitudTarjeta/welcome.php?CuentaCliente='+NoCuenta,// variablePHP
            type: 'POST',
            data: datos,
            contentType: false,
            processData: false,
            success: function(datos){
                $("#respuestaSolicitado").html(datos)                  
            }
        })
    }

})