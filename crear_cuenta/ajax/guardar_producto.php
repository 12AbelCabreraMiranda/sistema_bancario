<?php
	if (empty($_POST['name'])){
		$errors[] = "Ingresa el nombre del producto.";
	} elseif (!empty($_POST['name'])){
	require_once ("../conexion.php");//Contiene funcion que conecta a la base de datos
	
    $cuenta_nombre = mysqli_real_escape_string($con,(strip_tags($_POST["name"],ENT_QUOTES)));
	$cuenta_apellido = mysqli_real_escape_string($con,(strip_tags($_POST["apellido"],ENT_QUOTES)));
	$cuenta_dpi = mysqli_real_escape_string($con,(strip_tags($_POST["dpi"],ENT_QUOTES)));
	$cuenta_nit = mysqli_real_escape_string($con,(strip_tags($_POST["nit"],ENT_QUOTES)));
	$cuenta_telefono = mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));
	$cuenta_direccion = mysqli_real_escape_string($con,(strip_tags($_POST["direccion"],ENT_QUOTES)));
	$cuenta_usuCliente = mysqli_real_escape_string($con,(strip_tags($_POST["usuarioCliente"],ENT_QUOTES)));
	$cuenta_passCliente = mysqli_real_escape_string($con,(strip_tags($_POST["contraseniaCliente"],ENT_QUOTES)));
	//$cuenta_numCuenta = mysqli_real_escape_string($con,(strip_tags($_POST["numCuenta"],ENT_QUOTES)));
	//$cuenta_tipoCuenta = mysqli_real_escape_string($con,(strip_tags($_POST["tipo_cuenta"],ENT_QUOTES)));
	//$cuenta_saldoInicial = mysqli_real_escape_string($con,(strip_tags($_POST["saldoInicial"],ENT_QUOTES)));	

	// Registro en la BD
    $sql = "INSERT INTO clientes(id_clientes, nombre, apellido, dpi, nit, telefono,direccion,usuario_cliente,contrasenia_cliente) 
			VALUES (NULL,'$cuenta_nombre','$cuenta_apellido','$cuenta_dpi','$cuenta_nit','$cuenta_telefono','$cuenta_direccion','$cuenta_usuCliente','$cuenta_passCliente')";
    $query = mysqli_query($con,$sql);
    // Mensaje insertado registro en la base de datos
    if ($query) {
        $messages[] = "La cuenta ha sido registrado con éxito.";
    } else {
        $errors[] = "Lo sentimos, el registro falló. Por favor, vuelva a intentarlo.";
    }
		
	} else 
	{
		$errors[] = "desconocido.";
	}
if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}
?>