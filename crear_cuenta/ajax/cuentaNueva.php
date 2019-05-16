<?php
	if (empty($_POST['view_id'])){
		$errors[] = "ID está vacío.";
	} elseif (!empty($_POST['view_id'])){
	require_once ("../conexion.php");//Contiene funcion que conecta a la base de datos
	
	// escapando, además eliminando todo lo que podría ser código (html / javascript-)
    $tipoCuenta = mysqli_real_escape_string($con,(strip_tags($_POST["tipo_cuenta"],ENT_QUOTES)));
	$cuenta_saldoInicial = mysqli_real_escape_string($con,(strip_tags($_POST["saldoInicial"],ENT_QUOTES)));
		
	$id=intval($_POST['view_id']);	
	//A CONTINUACIÓN EXTRAER EL ID DE LA TABLA CUENTA PARA REGISTRARLO EN TABLA CHEQUERA 			
	$id_tablaCuenta;	
	$id_clienteRegistrado;
	$cuenta_nombre;
	$consulta3 = ("SELECT id_cuentas, id_clientes, nombre FROM cuentaclientebanco where id_clientes='$id'");
	$resultado3 = $con->query($consulta3);
	if($row = $resultado3->fetch_assoc()){      
		$id_tablaCuenta =$row['id_cuentas'];
		$id_clienteRegistrado =$row['id_clientes'];
		$cuenta_nombre=$row['nombre'];
		}
	
	//FUNCION PARA CREAR CODIGOS QUE SERVIRÁ PARA OTRA CUENTA DEL CLIENTE
	$selectquery="SELECT id_chequeras FROM chequeras ORDER BY id_chequeras DESC LIMIT 1"; //EXTRAE TOP ID DE LA ENTIDAD
	$result = $con->query($selectquery); 
	
	if($rows = $result->fetch_assoc()){
		$idTopChequera= $rows['id_chequeras'];
	} 
	//Variables 										
	$segundo = date ('s', time());
	$minuto = date ('i', time());
	$anio = date("Y");										
	$cuenta_numCuenta = $id_clienteRegistrado.strlen($cuenta_nombre).$segundo.$minuto.$anio.$idTopChequera;
	
	// insercion en la tabla chequera Registro en la BD
	$sql3 = "INSERT INTO chequeras(numero_de_cuenta, saldo_actual, cuenta_id_chequera, tipo_cuentas, estado) 
	VALUES ('$cuenta_numCuenta','$cuenta_saldoInicial','$id_tablaCuenta',$tipoCuenta,1)";
	$query3 = mysqli_query($con,$sql3);    
    
    if ($query3) {
        $messages[] = "La nueva cuenta ha sido Registrado con éxito.";
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