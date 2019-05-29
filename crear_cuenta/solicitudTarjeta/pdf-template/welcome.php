<?php
   $con = new mysqli("localhost","root","","sistema_bancario");
   
  
   
	
	$cuentaClienteLog = $_REQUEST["CuentaCliente"];//CuentaCliente (colocarlo)	
	    
	//TRAER DATOS
	$pinTarjeta;		
	$querySelect = ("SELECT codigo_tarjeta, pin_tarjeta, nombre,apellido,numero_de_cuenta,hora_solicitado,fecha_solicitado,nombre_tipoCuenta  from vista_tarjeta_debito where numero_de_cuenta ='$cuentaClienteLog' ");
	$resultSelect =$con->query($querySelect);
	if($row = $resultSelect->fetch_assoc()){
		$codigoTarjeta=$row['codigo_tarjeta'];
		$pinTarjeta=$row['pin_tarjeta'];
		$nombre=$row['nombre'];
		$apellido=$row['apellido'];
		$numeroCuenta=$row['numero_de_cuenta'];
		$hora=$row['hora_solicitado'];
		$fecha=$row['fecha_solicitado'];
		$tipoCuenta=$row['nombre_tipoCuenta'];		
	}
	//DESENCRIPTACIÓN DE PASSWORD
	$pinDesencriptado = SED::decryption($pinTarjeta);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

	<div class="container-fluid">
		<div class="col-md-8 col-md-offset-2">

			<div class="panel panel-info">
			<h2 class="text-center">ACCESO A CAJEROS AUTOMATICOS 5B</h2>
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-6">
							<h3>DATOS DE LA CUENTA BANCARIA</h3>
							<h4>Nombre del cliente: <?php  echo $row['nombre']; ?> <?php echo ' '; ?> <?php echo $row['apellido']; ?> </h4>
							NUMERO DE CUENTA: <?php  echo $row['numero_de_cuenta']; ?> <br>
							TIPO DE CUENTA: <?php  echo $row['nombre_tipoCuenta']; ?> <br>
							<br/>																					
						</div>
						
						<div class="col-md-4"><!--CODIGO QR-->
							<h4>DATOS DE AUTENTICACIÓN DE LA TARJETA DE DÉBITO </h4>
							CÓDIGO DE LA TARJETA DÉBITO: <?php  echo $row['codigo_tarjeta']; ?> 
							<br/>							
							<p>Escanear el código QR para ver PIN de acceso</p>
							<?php								
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

								
								

								//Enviamos los parametros a la Función para generar código QR 
								QRcode::png($pinDesencriptado, $filename, $level, $tamaño, $framSize); 

								//Mostramos la imagen generada
								echo '<img src="'.$dir.basename($filename).'" /><hr/>';  
							?>
						</div>
					</div>

				</div>
				<div class="panel-body">Con estos datos Usted podrá acceder al uso de CAJEROS AUTOMATICOS 5B y todas las que vienen  en el FUTURO en cualquier momento.
					<p>- Usted podrá consultar saldo</p>
					<p>- Usted podrá retirar dinero con máximo de Q.1000.00 en el dia</p> <hr>
					<h4>USO DE LA TARJETA</h4>
					<P>Utilizar el CÓDIGO de la tarjeta y el número de PIN para acceder al cajero automático</P><hr>
					<p>Fecha que fue solicitado la tarjeta de débito: <?php  echo $row['hora_solicitado']; ?> del <?php  echo $row['fecha_solicitado']; ?></p>
				</div>
			</div>
		</div>
	</div>

</body>
</html>