
<?php
    require_once ("../crear_cuenta/conexion.php");
    session_start();

    $usuarioLogeado = $_SESSION['user'];
    
    $bankCLiente;
    $consulta = ("SELECT nombre_banco FROM banco_cliente where usuario_cliente='$usuarioLogeado'");
    $resultado = $con->query($consulta);
    if($row = $resultado->fetch_assoc()){          
        $bankCLiente=$row['nombre_banco'];
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
 
 
    
<body style="background: white ">

    <?php       
        if(isset($_SESSION['user'])){
        }else{
            header("location:../inicio.php");
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
            <a href="pageCliente.php" class="navbar-brand">Sistema Bancario: <?php  echo $row['nombre_banco']; ?></a>
        </div>

        <div class="collapse navbar-collapse navbar-ex1-collapse">         
            <ul class="nav navbar-nav navbar-right">
            <a class="navbar-brand" style="font-size: 14px"> BANCA ELECTRÓNICA</a>
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
            <div class="col-md-10 col-md-offset-1" >
                <div class="table-responsive scrollable"style="border-radius:5px" >
                    <table class="table table-striped table-bordered table-hover table-condensed ">
                        <!-- ENCABEZADOS DE LA TABLA -->
                            <h3 style="text-align:center">MIS MOVIMIENTOS DE TRANSFERENCIAS</h3>
                            <tr class="info"  >
                                <th  class="alinearEncabezado" rowspan="1" >NOMBRE</th>
                                <th  class="alinearEncabezado" rowspan="1" >APELLIDO</th>
                                <th  class="alinearEncabezado" rowspan="1" >CUENTA QUE TRANSFIERE</th>
                                <th  class="alinearEncabezado" rowspan="1" >MONTO TRANSFERIDO</th>
                                <th  class="alinearEncabezado" rowspan="1" >CUENTA QUE RECIBE</th>                                                              
                                <th  class="alinearEncabezado" rowspan="1" >HORA</th>
                                <th  class="alinearEncabezado" rowspan="1" >FECHA</th>
                            </tr>
                            <?php
                               $passwordVirtual = $_SESSION['passV'];//implementado para ver saldo usu==                               
                                require_once ("../crear_cuenta/conexion.php");

                                $consultaPass = ("SELECT numero_de_cuenta FROM misaldovirtual where usuario_cliente ='$usuarioLogeado' and contrasenia_cliente='$passwordVirtual' ");
                                $resultadoPass = $con->query($consultaPass);
                                if($row = $resultadoPass->fetch_assoc()){          
                                    $cuentaVirtual=$row['numero_de_cuenta'];
                                }        
           

                                $querySaldo="SELECT *from transferencia where cuenta_transfiere='$cuentaVirtual'";
                                $resultadoSaldo=$con->query($querySaldo);
                                while($row=$resultadoSaldo->fetch_assoc()){
                            ?>  
                                    <tr>
                                        <td> <?php echo $row['cliente_que_transfiere']; ?> </td>
                                        <td>  <?php echo $row['apellido_que_transfiere']; ?></td>
                                        <td> <?php echo $row['cuenta_transfiere']; ?> </td>
                                        <td> <?php echo $row['monto_deTransaccion']; ?> </td>                                    
                                        <td> <?php echo $row['numeroCuenta_a_transferir']; ?> </td>    
                                        <td> <?php echo $row['hora_deTransaccion']; ?> </td>    
                                        <td> <?php echo $row['fecha_deTransaccion']; ?> </td>                                    
                                    </tr>                               
                            <?php      
                                }
                            ?>
                    </table>
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
                       Mi Cuenta Bancaria
                    </a>
                </li>
                <li>
                    <a href="pageCliente.php">Realizar Transferencia</a>
                </li>
                <li>
                    <a href="miSaldoVirtual.php">Consulta de Saldo</a>
                </li>
                <li>
                    <a href="miMovimientoVirtual.php">Mis movimientos</a>
                </li>
                <li>
                    <a href="#">Otros</a>
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
                location.href = '../inicio.php'
            });
        }
    </script>
</body>
</html>

    