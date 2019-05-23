<?php
	if (empty($_POST['delete_id'])){
		$errors[] = "Id vacío.";
	} elseif (!empty($_POST['delete_id'])){
	require_once ("../conexion.php");//Contiene funcion que conecta a la base de datos
	//id para identificar el registro
    $id_chequera=intval($_POST['delete_id']);
	

	// tabla Actualizado CHEQUERA
	$sql = "UPDATE chequeras SET estado=0 WHERE id_chequeras='".$id_chequera."' ";
    $query = mysqli_query($con,$sql);
	// 
	$sqlDelete = "UPDATE usuario_banca_virtual SET estado='Bloqueado' WHERE chequera_id_virtual='".$id_chequera."' ";
	$queryDelete = mysqli_query($con,$sqlDelete);
	
    if ($query) {
        $messages[] = "La cuenta ha sido Bloqueda con éxito.";
    } else {
        $errors[] = "Lo sentimos, el bloquéo falló. Por favor, regrese y vuelva a intentarlo.";
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