
<?php
    require_once ("../crear_cuenta/conexion.php");
    session_start();

    $usuarioLogeado = $_SESSION['user'];
    
    $id_empleadoBancoLogeado;
    $consulta = ("SELECT banco_id_empleado FROM empleado where nombre='$usuarioLogeado'");
    $resultado = $con->query($consulta);
    if($row = $resultado->fetch_assoc()){          
        $id_empleadoBancoLogeado=$row['banco_id_empleado'];
    }
    $nombre_empleadoBancoLogeado;
    $consulta2 = ("SELECT nombre_banco FROM banco where id_banco='$id_empleadoBancoLogeado'");
    $resultado2 = $con->query($consulta2);
    if($row = $resultado2->fetch_assoc()){          
        $nombre_empleadoBancoLogeado=$row['nombre_banco'];
    }

    $queryDocumento = "select idtipo_documento, nombre_documento from tipo_documento";
    $resultadoDocumento = $con->query($queryDocumento);
?>
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
    <link rel="stylesheet" href="css/estilos.css">

</head>
 
 
    
<body>

    <?php       
        if(isset($_SESSION['user'])){
        }else{
            header("location:../login/index.php");
        }
    ?>
    <!--Barra de Navegacion-->
    <nav class="navbar navbar-default">
        <div class="navbar-header">            
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Cambiar Navegacion</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="receptorPagador.php" class="navbar-brand">Sistema Bancario: <?php  echo $row['nombre_banco']; ?></a>
        </div>

        <div class="collapse navbar-collapse navbar-ex1-collapse">         
            <ul class="nav navbar-nav navbar-right">
            <a class="navbar-brand" style="font-size: 14px"> RECEPTOR PAGADOR </a>
                <li><a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['user']; ?></a>
                     <ul class="dropdown-menu">
                        <li><a href="javascript: void(0)"  onclick='cerrar();'>Cerrar Session</a></li>
                     
                    </ul>
                </li>
                
            </ul>
        </div>
    </nav>

    <!--FORMULARIOS -->
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel panel-info">
                    <div class="panel-heading" style="background-color: #0ca9c9;color:white"><h4 class="text-center"> DEPÓSITO DE CUENTAS</h4></div>
                    <div class="panel-body" style="background-color: #b4ddf7">        

                        <form action="receptorPagador.php" id="formBuscarCuenta" method="post" enctype="multipart/form-data">
                            <div class="container-fluid">
                                                            
                                <div class="input-group col-md-5 col-xs-12 col-md-offset-3">
                                    <input REQUIRED name="numeroCuenta" type="text" class="form-control" placeholder="Ingresar número de cuenta" onkeypress="return soloNumero(event)" onpaste="return false"/>
                                    <span class="input-group-btn">
                                                                                    
                                        <input  onclick="buscarCuenta()" id="botonBuscar" type="submit" class="btn btn-info" value="Buscar"> 
                                                                                  
                                    </span>
                                </div>  <br>
                            </div>
                        </form>

                        <form action="receptorPagador.php" method="post" id="formRegistrarDeposito" enctype="multipart/form-data">    
                            <div class="row">
                                <div class="container-fluid">
                                
                                    <div class="col-sm-7">
                                        <div class='col-sm-7'>                                                               
                                            <div class="form-group">                                    
                                                <label for="nombre">¿Cuánto va a depositar?</label>                        
                                                <input REQUIRED name="cantidad" class="form-control" id="cantidad" type="text" placeholder="Q. 00.00" onkeypress="return soloNumero(event)" onpaste="return false">
                                            </div>
                                                                                                                        
                                            <p style="display:none" class="numCuentaCliente">numero cuenta para guardar deposito</p>                                   
                                        </div>
                                        
                                        <div class="form-group col-md-5"> 
                                            <label>TIPO DOCUMENTO </label>								
                                            <select name="tipoDoc" class="form-control"  id="tipoDoc">
                                                <?php while($row = $resultadoDocumento->fetch_assoc()){  ?>
                                                    <option value="<?php echo $row['idtipo_documento']; ?> ">
                                                        <?php  echo $row['nombre_documento']; ?>                                             
                                                    </option>
                                                <?php }?>
                                            </select> 								
                                        </div>
                                        <div class="col-sm-12"> <!-- Respuesta de la base de datos-->   
                                            <div id="respuestaDepositado"></div>
                                        </div>
                                    </div>

                                    <div class='col-sm-5' id="datoCuenta" >
                                        <h4 class="text-center">Datos de la cuenta</h4>                                
                                        <p  class="nombreCliente"> </p>                                                                
                                    </div> 
                                    <div class=" pull-right">
                                        <center> <br>
                                            <input disabled onclick="registrarDeposito()" id="boton" type="submit" class="btn btn-info" value="Realizar depósito">                       
                                        </center> 
                                    </div>
                                </div>



                            </div>                                               
                            

                                            
                            
                            
                        </form>                                                    

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Menú lateral isquierdo -->
    <div id="wrapper">
        <div class="overlay"></div>    
        <!-- Menús -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                       Receptor Pagador
                    </a>
                </li>
                <li>
                    <a href="receptorPagador.php">Realizar Depósito</a>
                </li>
                <li>
                    <a href="retiros.php">Realizar Retiros</a>
                </li>
                <li>
                    <a href="#">Realizar Transacciones</a>
                </li>
                <li>
                    <a href="#">Cambio de dólares</a>
                </li>                                                              
            </ul>
        </nav>        

        <!-- Page Content -->
        <div id="page-content-wrapper" >
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas" style="margin-top:40px">
                <span class="hamb-top"></span>
    			<span class="hamb-middle"></span>
				<span class="hamb-bottom"></span>
            </button>            
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
                location.href = '../login/index.php'
            });
        }
    </script>
</body>
</html>

    