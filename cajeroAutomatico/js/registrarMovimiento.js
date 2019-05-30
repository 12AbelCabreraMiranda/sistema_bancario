$(document).ready(function(){
    
    $("#formRegistrarRetiro").submit(registrarRetiro)
    function registrarRetiro(evento){
        evento.preventDefault()        
        
        setTimeout("location.href='pageCliente.php'", 8000);//refress page     

        var datos = new FormData($("#formRegistrarRetiro")[0])        
          $.ajax({
              url: 'queryBD/registrarDeposito.php',
              type: 'POST',
              data: datos,
              contentType: false,
              processData: false,
              success: function(datos){
                  $("#respuestaRetirado").html(datos)                  
              }
          })                 
    }



})

