<?php
	session_start();

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
		$cuenta_numCuenta = mysqli_real_escape_string($con,(strip_tags($_POST["numCuenta"],ENT_QUOTES)));
		$cuenta_tipoCuenta = mysqli_real_escape_string($con,(strip_tags($_POST["tipo_cuenta"],ENT_QUOTES)));
		$cuenta_saldoInicial = mysqli_real_escape_string($con,(strip_tags($_POST["saldoInicial"],ENT_QUOTES)));
		$usuarioLogeado = $_SESSION['user'];	

		//SELECCION USUARIO para extraer id del logeado
		$id_logeado;
		$id_empleadoBanco;
		$consulta1 = ("SELECT id_empleados, banco_id_empleado FROM empleado where nombre='$usuarioLogeado'");
		$resultado1 = $con->query($consulta1);
		if($row = $resultado1->fetch_assoc()){      
			$id_logeado =$row['id_empleados'];
			$id_empleadoBanco=$row['banco_id_empleado'];
		}
	 
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
			
		
		$id_clienteRegistrado;	
		$consulta2 = ("SELECT id_clientes FROM clientes where nombre='$cuenta_nombre'");
		$resultado2 = $con->query($consulta2);
		if($row = $resultado2->fetch_assoc()){      
			$id_clienteRegistrado =$row['id_clientes'];		
			}	

		//HORA SISTEMA AL REGISTRARSE
		ini_set('date.timezone', 'America/Guatemala');
		$hora_sistema = date ('H:i:s', time());
		//FECHA SISTEMA AL REGISTRARSE
		ini_set('date.timezone', 'America/Guatemala');
		$fecha_sistema = date("d-m-Y");
		

		// insercion en la tabla cuenta Registro en la BD
		$sql2 = "INSERT INTO cuenta(banco_id, hora_apertura, fecha_apertura, tipo_cuentas, empleado_id_cuenta, cliente_id_cuenta) 
				VALUES (NULL,'$$id_empleadoBanco','$hora_sistema','$fecha_sistema','$cuenta_tipoCuenta','$id_logeado','$id_clienteRegistrado')";
		$query2 = mysqli_query($con,$sql2);
		// Mensaje insertado registro en la base de datos
		if ($query2) {
			$messages[] = "La cuenta ha sido registrado con éxito.";
		} else {
			$errors[] = "Lo sentimos, el registro falló. Por favor, vuelva a intentarlo.";
			}

		//A CONTINUACIÓN EXTRAER EL ID DE LA TABLA CUENTA PARA REGISTRARLO EN TABLA CHEQUERA ---pendiente
		//agregar otro atributo a la tabla cuenta para poder dominar su ID
		$id_cuentaRegistrado;	
		$consulta3 = ("SELECT id_cuentas FROM cuenta where nombre='$cuenta_nombre'");
		$resultado3 = $con->query($consulta2);
		if($row = $resultado3->fetch_assoc()){      
			$id_cuentaRegistrado =$row['id_clientes'];		
			}






	} else{
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