<?php
	
		require_once('usuarioQuery.php');


		$boton=$_POST['boton'];

		switch ($boton) {
			case 'cerrar':
					session_start();
					session_destroy();
				break;
			/*case 'ingresar': //este caso no está en funcion
					$usu = $_POST['usu'];
					$contrasenia = $_POST['contrasenia'];

					$ins = new usuario();
					$array=$ins->identificar($usu,$contrasenia);
					if ($array[0]==0) 
					{
						echo '0';
					}
					else
					{
						session_start();
						$_SESSION['ingreso']='YES';
						$_SESSION['nombre']=$array[1];
					}
				break;*/

			case 'registrar':
					$nombres=$_POST['nombres'];
					$apellidos=$_POST['apellidos'];
					$telefono=$_POST['telefono'];
					$direccion=$_POST['direccion'];	
					$banco=$_POST['banco'];
					$tipoUsu=$_POST['tipoUsuario'];				
					$usuario = $_POST['usuario'];
					$password = $_POST['password'];
					$instancia = new usuario();
					if($instancia->registrar($nombres,$apellidos,$telefono,$direccion,$banco,$tipoUsu,$usuario,$password)){
						echo "exito";
					}else{
						echo "no_exito";
					}
				break;
			default:
				# code...
				break;
		}

		
?>