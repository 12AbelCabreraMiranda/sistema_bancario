$(document).ready(function(){
    $("#formBuscarCuenta").submit(buscarCuenta)
    function buscarCuenta(evento){
        evento.preventDefault()
        //alert("funciona registro");
        $('#boton').attr("disabled", false);
        var datos = new FormData($("#formBuscarCuenta")[0])        
          $.ajax({
              url: 'queryBD/consultaDatosCuenta.php',
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
                url: 'queryBD/consultaCuenta.php',
                type: 'POST',
                data: datos,
                contentType: false, //se anota porque se mandarán archivos
                processData: false,
                success: function(datos){
                    $(".numCuentaCliente").html(datos)
                }
            })
    }

    //  -----------depositar ---------------
    $("#formRegistrarDeposito").submit(registrarDeposito)
    function registrarDeposito(evento){
        evento.preventDefault()
        //alert("funciona");
        
        setTimeout("location.href='pageCliente.php'", 8000);//refress page
        //$(".nombreCliente").empty(); //reset divs
        $('#boton').attr("disabled", true);

        var datos = new FormData($("#formRegistrarDeposito")[0])

        var NoCuenta = $(".numCuentaCliente").text();//valorClass
          $.ajax({
              url: 'queryBD/registrarDeposito.php?CuentaCliente='+NoCuenta,// variablePHP
              type: 'POST',
              data: datos,
              contentType: false,
              processData: false,
              success: function(datos){
                  $("#respuestaDepositado").html(datos)                  
              }
          })                 
    }



})

