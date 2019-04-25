<?php
	if (empty($_POST['edit_id'])){
		$errors[] = "ID está vacío.";
	} elseif (!empty($_POST['edit_id'])){
	require_once ("../conexion.php");//Contiene funcion que conecta a la base de datos
	// escapando, además eliminando todo lo que podría ser código (html / javascript-)
    $cuenta_nombre = mysqli_real_escape_string($con,(strip_tags($_POST["edit_nombre"],ENT_QUOTES)));
	$cuenta_apellido = mysqli_real_escape_string($con,(strip_tags($_POST["edit_apellido"],ENT_QUOTES)));
	$cuenta_dpi = mysqli_real_escape_string($con,(strip_tags($_POST["edit_dpi"],ENT_QUOTES)));
	$cuenta_nit = mysqli_real_escape_string($con,(strip_tags($_POST["edit_nit"],ENT_QUOTES)));
	$cuenta_telefono = mysqli_real_escape_string($con,(strip_tags($_POST["edit_telefono"],ENT_QUOTES)));
	$cuenta_direccion = mysqli_real_escape_string($con,(strip_tags($_POST["edit_direccion"],ENT_QUOTES)));
	$cuenta_usuarioCliente = mysqli_real_escape_string($con,(strip_tags($_POST["edit_UsuarioCliente"],ENT_QUOTES)));
	$cuenta_contraseniaCliente = mysqli_real_escape_string($con,(strip_tags($_POST["edit_passwordCliente"],ENT_QUOTES)));

	//$stock = intval($_POST["edit_stock"]);
	//$price = floatval($_POST["edit_price"]);
	
	$id=intval($_POST['edit_id']);
	// UPDATE data into database
    $sql = "UPDATE clientes SET nombre='".$cuenta_nombre."', apellido='".$cuenta_apellido."', dpi='".$cuenta_dpi."', nit='".$cuenta_nit."',  telefono='".$cuenta_telefono."',  direccion='".$cuenta_direccion."',  usuario_cliente='".$cuenta_usuarioCliente."',  contrasenia_cliente='".$cuenta_contraseniaCliente."'  WHERE id_clientes='".$id."' ";
    $query = mysqli_query($con,$sql);
    // if product has been added successfully
    if ($query) {
        $messages[] = "Los datos han sido actualizados con éxito.";
    } else {
        $errors[] = "Lo sentimos, la actualización falló. Por favor, vuelva a intentarlo.";
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