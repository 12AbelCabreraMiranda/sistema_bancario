$(document).ready(function(){
    //  -----------depositar ---------------
    $("#formBuscarCuenta").submit(buscarCuenta)
    function buscarCuenta(evento){
        evento.preventDefault()
        //alert("funciona registro");
        $('#boton').attr("disabled", false);
        var datos = new FormData($("#formBuscarCuenta")[0])        
          $.ajax({
              url: 'solicitudTarjeta/consultaDatosCuenta.php',
              type: 'POST',
              data: datos,
              contentType: false, //se anota porque se mandarán archivos
              processData: false,
              success: function(datos){
                  $(".nombreCliente").html(datos)
              }
          })


            //otra consulta
            $.ajax({
                url: 'solicitudTarjeta/consultaCuenta.php',
                type: 'POST',
                data: datos,
                contentType: false, //se anota porque se mandarán archivos
                processData: false,
                success: function(datos){
                    $(".numCuentaCliente").html(datos)
                }
            })
    }

})