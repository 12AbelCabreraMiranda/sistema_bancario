$(document).ready(function(){
    $("#formBuscarCuentaMonetaria").submit(buscarCuentaMonetaria)
    function buscarCuentaMonetaria(evento){
        evento.preventDefault()
        //alert("funciona registro");
        $('#boton').attr("disabled", false);
        var datos = new FormData($("#formBuscarCuentaMonetaria")[0])        
          $.ajax({
              url: 'queryBD/consultaDatosCuentaMonetario.php',
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
                url: 'queryBD/consultaCuentaMonetario.php',
                type: 'POST',
                data: datos,
                contentType: false, //se anota porque se mandarán archivos
                processData: false,
                success: function(datos){
                    $(".numCuentaCliente").html(datos)
                }
            })

             //otra consulta
             $.ajax({
                url: 'queryBD/consultaIdCheque.php',
                type: 'POST',
                data: datos,
                contentType: false, //se anota porque se mandarán archivos
                processData: false,
                success: function(datos){
                    $(".idNumCheque").html(datos)
                }
            })
    }
})

