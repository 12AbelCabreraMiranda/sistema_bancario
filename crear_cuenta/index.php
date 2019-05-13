<?php 

    require_once ("conexion.php");
    session_start();
    
    $usuarioLogeado = $_SESSION['user'];

    $id_empleadoBancoLogeado;
    $consulta = ("SELECT banco_id_empleado FROM empleado where usuario='$usuarioLogeado'");
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
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cuentas clientes</title>
<link rel="icon" href="../img/icono.png">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="css/custom.css">
</head>
<body>
    <?php         
        if(isset($_SESSION['user'])){
        }else{
            header("location:../inicio.php");
        }
    ?>
	<!--Barra de Navegacion-->
    <nav class="navbar navbar-default" style="background-color: #269b76">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Cambiar Navegacion</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand" style="color:white">Sistema Bancario: <?php  echo $row['nombre_banco']; ?></a>            
        </div>

        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">
                <a class="navbar-brand" style="font-size: 14px;color:white"> SERVICIO AL CLIENTE </a>
                <li><a href="javascript: void(0)" style="color:white" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['user']; ?></a>
                     <ul class="dropdown-menu">
                        <li><a href="javascript: void(0)" onclick='cerrar();'>Cerrar Session</a></li>
                     
                    </ul>
                </li>
                
            </ul>
        </div>
	</nav>
	
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2><b>Cuenta Clientes Registrados</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addProductModal" class="btn btn-info" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Registrar nueva cuenta</span></a>
					</div>
                </div>
            </div>
			<div class='col-sm-4 pull-right'>
				<div id="custom-search-input">
                            <div class="input-group col-md-12">
                                <input type="text" class="form-control" placeholder="Buscar"  id="q" onkeyup="load(1);" />
                                <span class="input-group-btn">
                                    <button class="btn btn-info" type="button" onclick="load(1);">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                </div>
			</div>
			<div class='clearfix'></div>
			<hr>
			<div id="loader"></div><!-- Carga de datos ajax aqui -->
			<div id="resultados"></div><!-- Carga de datos ajax aqui -->
			<div class='outer_div'></div><!-- Carga de datos ajax aqui -->
            
			
        </div>
    </div>
	<!-- Edit Modal HTML -->
	<?php include("html/modal_add.php");?>
	<!-- Edit Modal HTML -->
	<?php include("html/modal_edit.php");?>
	<!-- Delete Modal HTML -->
    <?php include("html/modal_delete.php");?>
    <?php include("html/modal_vista.php");?>
    <script src="js/script.js"></script>
    <script src="js/limiteCaracter.js"></script>

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