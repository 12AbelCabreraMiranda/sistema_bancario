<?php
   $con = new mysqli("localhost","root","","sistema_bancario");
   session_start();

	
	$cuentaClienteLog = $_REQUEST["vista_NumCuentaCliente"];
	
    
		//TRAER DATOS		
		$querySelect = ("SELECT usuario_cliente, contrasenia_cliente, nombre,apellido,numero_de_cuenta,hora_solicitado,fecha_solicitado  from vista_usuarios_banca_virtual where numero_de_cuenta ='$cuentaClienteLog' ");
		$resultSelect =$con->query($querySelect);
		if($row = $resultSelect->fetch_assoc()){
			$usu=$row['usuario_cliente'];
			$pass=$row['contrasenia_cliente'];
			$nombre=$row['nombre'];
			$apellido=$row['apellido'];
			$numeroCuenta=$row['numero_de_cuenta'];
			$hora=$row['hora_solicitado'];
			$fecha=$row['fecha_solicitado'];

		  
		}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
</head>
<body>

	<div class="container-fluid">
		<div class="panel panel-success">
		
			<div class="panel-heading">
			<h3>Nombre del cliente: <?php  echo $row['nombre']; ?> &nbsp; <?php echo $row['apellido']; ?> </h3>
				NUMERO DE CUENTA: <?php  echo $row['numero_de_cuenta']; ?> 
				<br/> <br>
				Usuario <?php  echo $row['usuario_cliente']; ?> 
				<br/>
				Contraseña : <?php  echo $row['contrasenia_cliente']; ?>
			</div>
			<div class="panel-body">Con estos datos Usted podrá acceder al uso de la Banca Virtual.
				<p>Fecha que fue solicitado estos datos: <?php  echo $row['hora_solicitado']; ?> del <?php  echo $row['fecha_solicitado']; ?></p>
			</div>
		</div>
	</div>

</body>
</html>