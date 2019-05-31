
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Receptor Pagador</title>
    <link rel="icon" href="../img/icono.png">
    <link rel="stylesheet" href="../login/Resources/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    

</head>

 
 
    
<body style="background: #332c2c ">
    
  
    <!--Barra de Navegacion-->
    <!-- 
    <nav class="navbar navbar-default">
        <div class="navbar-header">            
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Cambiar Navegacion</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="pageCliente.php" class="navbar-brand">CAJERO AUTOMÁTICO   </a>
        </div>

        <div class="collapse navbar-collapse navbar-ex1-collapse">         
            <ul class="nav navbar-nav navbar-right">
            <a class="navbar-brand" style="font-size: 14px"> CÓDIGO DE TARJETA DÉBITO </a>
                <li><a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown"></a>
                     <ul class="dropdown-menu">
                        <li><a href="javascript: void(0)"  onclick='cerrar();'>Cerrar Session</a></li>
                     
                    </ul>
                </li>
                
            </ul>
        </div>
    </nav>-->
    <?php include("menu_nav/index.php");?>

    <?php include("opciones.php");?>


    <!--FORMULARIOS RETIRO DE SALDO-->
    <div class="container" style="display:none; margin-top:100px" id="retiroSaldo">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-5">
                <div class="panel panel-warning">
                    <div class="panel-heading" style="background-color: color:white"><h4 class="text-center"> 💸💸RETIRAR DINERO 💪</h4></div>
                    <div class="panel-body" style="background-color: #e8e5e5">                              

                        <form action="pageCliente.php" method="post" id="formRegistrarRetiro" enctype="multipart/form-data">    
                            <div class="row">
                                <div class="container-fluid">
                                
                                    <div class="col-sm-6">                                                                                                     
                                        <div class="form-group">                                    
                                            <label for="nombre">¿Cuánto  va a retirar? </label>                        
                                            <input REQUIRED name="cantidad" class="form-control" id="cantidad" type="text" placeholder="Q. 00.00" onkeypress="return soloNumero(event)" onpaste="return false">
                                        </div>                                                                                                                                                                                                                                                                                                                             
                                        
                                    </div>
                                   
                                    <div class="col-sm-6" >
                                        <center> <br>
                                            <input onclick="cancelarRetiro()" type="button" class="btn btn-block btn-warning" value="CANCELAR">   <p></p>
                                            <input onclick="registrarRetiro()" id="boton" type="submit" class="btn btn-block btn-success" value="Realizar retiro">                       
                                        </center> 
                                    </div>
                                    <div class="col-sm-12"> <!-- Respuesta de la base de datos-->   
                                        <div id="respuestaRetirado"></div>
                                    </div>
                                </div>
                            </div>                                                                                                                                                                               
                        </form>                                                    
                       

                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="../crear_cuenta/js/limiteCaracter.js"></script>
    <script src="../login/Resources/js/jquery-1.11.2.js"></script>
    <script src="../login/Resources/js/bootstrap.min.js"></script>
    <script src="js/evento.js"></script>
    <script src="js/registrarMovimiento.js"></script>

    <script>
        function cerrar()
        {
            $.ajax({
                url:'../login/Models/usuario.php',
                type:'POST',
                data:"boton=cerrar"
            }).done(function(resp){
                location.href = '../inicio.php'
            });
        }
    </script>
</body>
</html>

    