<?php
   $con = new mysqli("localhost","root","","sistema_bancario");
   session_start();

	
	$cuentaClienteLog = $_REQUEST["vista_NumCuentaCliente"];
	
    
		//TRAER DATOS		
		$querySelect = ("SELECT usuario_cliente, contrasenia_cliente, nombre,apellido,numero_de_cuenta,hora_solicitado,fecha_solicitado,nombre_tipoCuenta  from vista_usuarios_banca_virtual where numero_de_cuenta ='$cuentaClienteLog' ");
		$resultSelect =$con->query($querySelect);
		if($row = $resultSelect->fetch_assoc()){
			$usu=$row['usuario_cliente'];
			$pass=$row['contrasenia_cliente'];
			$nombre=$row['nombre'];
			$apellido=$row['apellido'];
			$numeroCuenta=$row['numero_de_cuenta'];
			$hora=$row['hora_solicitado'];
			$fecha=$row['fecha_solicitado'];
			$tipoCuenta=$row['nombre_tipoCuenta'];
		  
		}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

	<div class="container-fluid">
		<div class="col-md-8 col-md-offset-2">

			<div class="panel panel-success">
			<h2 class="text-center">BANCA ELECTRÓNICA</h2>
				<div class="panel-heading">
				<h3>Nombre del cliente: <?php  echo $row['nombre']; ?> &nbsp; <?php echo $row['apellido']; ?> </h3>
					NUMERO DE CUENTA: <?php  echo $row['numero_de_cuenta']; ?> <br>
					TIPO DE CUENTA: <?php  echo $row['nombre_tipoCuenta']; ?> <br>
					<br/> <br>
					Usuario <?php  echo $row['usuario_cliente']; ?> 
					<br/>
					Contraseña : <?php  echo $row['contrasenia_cliente']; ?>
					<div>mostrar codigo QR here
						<?php
							$conexion = new mysqli("localhost","root","","sistema_bancario");

							$usu;
							$query = "SELECT  nombre from clientes where id_clientes=1";
							$resultado = $conexion->query($query);
							if($row = $resultado->fetch_assoc()){
								$usu= $row['nombre'];
							} 
							//Agregamos la libreria para genera códigos QR
							require "phpqrcode/qrlib.php";    

							//Declaramos una carpeta temporal para guardar la imagenes generadas
							$dir = 'temp/';

							//Si no existe la carpeta la creamos
							if (!file_exists($dir))
								mkdir($dir);

								//Declaramos la ruta y nombre del archivo a generar
							$filename = $dir.'test.png';

								//Parametros de Condiguración

							$tamaño = 10; //Tamaño de Pixel
							$level = 'L'; //Precisión Baja
							$framSize = 3; //Tamaño en blanco
							//$Contraseña = "Cabrera"; //Texto

								//Enviamos los parametros a la Función para generar código QR 
							QRcode::png($usu, $filename, $level, $tamaño, $framSize); 

								//Mostramos la imagen generada
							echo '<img src="'.$dir.basename($filename).'" /><hr/>';  
						?>


					</div>
				</div>
				<div class="panel-body">Con estos datos Usted podrá acceder al uso de la Banca Virtual desde su dispositivo en cualquier momento.
					<p>- Usted podrá consultar saldo</p>
					<p>- Realizar Transaferencia de saldo a cualquier cuenta de otro banco</p> <hr>
					<p>Fecha que fue solicitado estos datos: <?php  echo $row['hora_solicitado']; ?> del <?php  echo $row['fecha_solicitado']; ?></p>
				</div>
			</div>
		</div>
	</div>

</body>
</html>