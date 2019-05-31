    <?php    
    	session_start();   
        if(isset($_SESSION['user'])){
        }else{
            header("location:../inicio.php");
        }
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../menu_nav/css/menu.css">
    
	<script type="text/javascript" src="../menu_nav/js/jquery.js"></script>
	<script type="text/javascript" src="../menu_nav/js/function.js"></script>
</head>
<body>
    <div style="background:#0099cc; font-size:26px; text-align:center; color:#FFF; font-weight:bold; height:60px; padding-top:20px;">CAJERO AUTOMÁTICO</div>
    <div id="wrap">
        <div id="nav_header">
            <div class="inner relative">
                <a class="logo" href="#"><img src="../menu_nav/images/cajero.png"  alt="fresh design web"></a>
                <a id="menu-toggle" class="button dark" href="#"><i class="icon-reorder"></i></a>
                <nav id="navigation">
                    <ul id="main-menu">
                        <li ><a href="../pageCliente.php">ir a INICIO</a></li>
                        <li class="current-menu-item"><a href="#">CÓDIGO DE TARJETA DÉBITO INSERTADO--></a></li>
                                        
                        <li class="parent">
                            <a href="#"><?php echo $_SESSION['user']; ?> </a>
                            <ul class="sub-menu">
                                <li><a href="javascript: void(0)"  onclick='cerrar();'>Cerrar Sesión</a></li>						
                            </ul>
                        </li>
                        
                    </ul>
                </nav>
                <div class="clear"></div>
            </div>
        </div>	
    </div> 



     <!--clientes -->
    <div class="row">
 
        <div class="col-md-6 col-md-offset-3" >
            <div class="table-responsive scrollable"style="border-radius:5px" >
                <table class="table table-striped table-bordered table-hover table-condensed ">
                    <!-- ENCABEZADOS DE LA TABLA -->
                        <h3 style="text-align:center">DATOS</h3>
                        <tr class="info"  >
                            <th  class="alinearEncabezado" rowspan="1" >NOMBRE</th>
                            <th  class="alinearEncabezado" rowspan="1" >APELLIDO</th>
                            <th  class="alinearEncabezado" rowspan="1" >CODIGO DE TARJETA</th>
                            <th  class="alinearEncabezado" rowspan="1" >MI SALDO ACTUAL</th>                                                              
                        </tr>
                        <?php
                            $codigoTarjetaLogeado = $_SESSION['user'];

                            require_once ("../../crear_cuenta/conexion.php");
                            $query="Select *from vista_tarjeta_debito  where codigo_tarjeta='$codigoTarjetaLogeado' ";
                            $resultado=$con->query($query);
                            while($row=$resultado->fetch_assoc()){
                        ?>  
                                <tr>
                                    <td> <?php echo $row['nombre']; ?> </td>
                                    <td>  <?php echo $row['apellido']; ?></td>
                                    <td> <?php echo $row['codigo_tarjeta']; ?> </td>
                                    <td> <?php echo $row['saldo_actual']; ?> </td>                                    
                                </tr>                               
                        <?php      
                            }
                        ?>
                </table>
            </div>
        </div>
    </div>

<script src="../js/evento.js"></script>

<script>
    function cerrar()
    {
        $.ajax({
            url:'../../login/Models/usuario.php',
            type:'POST',
            data:"boton=cerrar"
        }).done(function(resp){
            location.href = '../../inicio.php'
        });
    }
</script>
</body>
</html>