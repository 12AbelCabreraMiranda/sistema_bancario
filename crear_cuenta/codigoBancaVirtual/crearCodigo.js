$(document).ready(function(){

    //  -----------GUARDAR SOLICITUD ---------------
    $("#vista_cuenta").submit(registrarSolicitudVirtual)
    function registrarSolicitudVirtual(evento){
        evento.preventDefault()
        //alert("funciona");
        
        //setTimeout("location.href='receptorPagador.php'", 10000);//refress page
                //$(".nombreCliente").empty(); //reset divs
       // $('#boton').attr("disabled", true);

        var datos = new FormData($("#vista_cuenta")[0])

        var NoCuenta = $("#vista_NumCuentaCliente").text();//valorClass
          $.ajax({
              url: 'codigoBancaVirtual/generate.php?CuentaCliente='+NoCuenta,// variablePHP
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