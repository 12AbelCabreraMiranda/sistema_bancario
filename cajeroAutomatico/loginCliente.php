<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../img/icono.png">
	<title>Mi Banco</title>
    <link rel="stylesheet" href="../login/Resources/css/bootstrap.min.css">
</head>

<body style="background: #167246">
    <!--Barra de Navegacion-->
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Cambiar Navegacion</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="../inicio.php" class="navbar-brand">CAJERO AUTOMÁTICO</a>
        </div>

        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right" >
                <li><a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown">Identifícate</a>
                    <ul class="dropdown-menu">                        
                        <li ><a href="../login/index.php" >EMPLEADO o ADMINISTRADOR</a></li>
                        <li ><a href="../bancaElectronica/loginCliente.php" >Banca Electrónca</a></li>
                        <li ><a href="loginCliente.php" >Cajero Automático</a></li>
                    </ul>
                </li>                
            </ul>
        </div>
    </nav>
    <!--LOGIN -->
    <div class="container" style="margin-top:120px">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><b> ACCESO A CAJERO AUTOMÁTICO </b></div>
                    <div class="panel-body">
                        
                        <form role="form" id="login_form">
                            <div class="form-group">
                                <label for="usu">CÓDIGO DE TARJETA:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                    <input REQUIRED type="text" class="form-control" name="user" id="user" placeholder="Ingresar código de tarjeta">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="contrasenia">PIN</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-qrcode"></span></span>
                                    <input REQUIRED type="password" class="form-control" name="password" id="password" placeholder="Ingresar PIN de la tarjeta">
                                </div>
                            </div> 
                            <center>
                                <button type="button" name="login" id="login" class="btn btn-default"><span class="glyphicon glyphicon-send"></span> ACCEDER</button>   
                            </center>                   
                        
                        </form>                    
                    </div>
                    <div class="alert alert-danger text-center" style="display:none;" id="result">
                        <p>Usuario o Contraseña no identificados</p>
                    </div>
                </div>
            </div>
        </div>       

    </div>
       
	<script src="../login/Resources/js/jquery-1.11.2.js"></script>
	<script src="../login/Resources/js/bootstrap.min.js"></script>
    
    <script>
        //setTimeout("location.href='../inicio.php'", 20000);
        //FUNCION DE AUTENTICACIÓN DE USUARIOS
        $(document).ready(function() {
            $('#login').click(function(){
            var user = $('#user').val();
            var pass = $('#password').val();
            if($.trim(user).length > 0 && $.trim(pass).length > 0){
                $.ajax({
                url:"logueame.php",
                method:"POST",
                data:{user:user, pass:pass},
                cache:"false",
                beforeSend:function() {
                    $('#login').val("Conectando...");
                },
                success:function(data) {
                    //Esta función permite mantener por 3 segundos el mensaje de alerta guardado con exito
                    $("#result").css('display', 'none');
                        setTimeout(function() {                
                            $("#result").fadeOut(1500);
                            //limpiar los campos de textos                  
                            $("#login_form")[0].reset().fadeOut(1500);
                        },3000); 
                    //Esta función permite mantener por 3 segundos el mensaje de alerta guardado con exito

                    $('#login').val("Login");
                    if (data=="debito") {
                    $(location).attr('href','pageCliente.php');
                    }
                                                                    
                    if (data!=="debito") {   //si no reconoce ningun usuario registrado, muestra alerta             
                    $("#result").show();                    
                    }
                }
                });
            };
            });
        });
    </script>

</body>
</html>