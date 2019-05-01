
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
                <li><a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['user']; ?></a>
                     <ul class="dropdown-menu">
                        <li><a href="javascript: void(0)" onclick='cerrar();'>Cerrar Session</a></li>
                     
                    </ul>
                </li>
                
            </ul>
        </div>
    </nav>
    <center>
        <div style="margin-left:20px"><h4>Módulo RECEPTOR PAGADOR </h4></div>
    </center>

    <!--FORMULARIOS -->
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel panel-info">
                    <div class="panel-heading"><h4>Depósitos</h4></div>
                    <div class="panel-body">                     
                        
                        <form action="misAlumnos.php" method="post" id="formDatosEstudiantes" enctype="multipart/form-data">                                                   
                            <div class='col-sm-5'>
                                <label for="nombre">Número de cuenta</label> 
                                
                                <div class="input-group col-md-12">
                                    <input REQUIRED name="numeroCuenta" type="text" class="form-control" placeholder="Ej. 32892928"/>
                                    <span class="input-group-btn">
                                        <button class="btn btn-info" type="button">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span>
                                </div>
                                
                                <div class="form-group">
                                    <p></p>
                                    <label for="nombre">¿Cuánto va a depositar?</label>                        
                                    <input REQUIRED name="cantidad" class="form-control" id="cantidad" type="text" placeholder="Q. 00.00">
                                </div>
                                <!-- Respuesta de la base de datos-->
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong>Éxito!  </strong>  Se ha registrado el depósito 
                                </div>
                                   
                                
                            </div>

                            <div class='col-sm-7' id="datoCuenta">
                                <h4 class="text-center">Datos de la cuenta</h4>
                                <p>No. de cuenta: <b> 123456789</b></p>
                                <p>Cliente: <b> Tomy Vargas</b></p>
                                <p>Banco: <b> Banrural</b></p>
                                
                            </div>
                            
                            <div class="form-group pull-left">
                                <center> <br>
                                    <input  onclick="registrarAlumno()" id="boton" type="submit" class="btn btn-info" value="Realizar depósito">                       
                                </center> 
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
        <!-- Menú lateral isquierdo -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                       Receptor Pagador
                    </a>
                </li>
                <li>
                    <a href="#">Realizar Depósito</a>
                </li>
                <li>
                    <a href="#">Realizar Retiros</a>
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

    <script src="../login/Resources/js/jquery-1.11.2.js"></script>
    <script src="../login/Resources/js/bootstrap.min.js"></script>
    <script src="js/evento.js"></script>

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

    