<?php 
	class usuario
	{
		private $conexion;
		public function __construct()
		{
			require_once('conexion.php');
			$this->conexion= new conexion();
			$this->conexion->conectar();
		}

		/*function identificar($usuario,$password)
		{
			$pass=sha1($password);
			
			$sql="SELECT id_empleados FROM empleado WHERE usuario='$usuario' && contrasenia='$pass'";
			$resulatdos = $this->conexion->conexion->query($sql);
			if ($resulatdos->num_rows > 0) {
				$r=$resulatdos->fetch_array();								
			}
			else{
				$r[0]=0;
			}
			return $r;
			$this->conexion->cerrar();
		}*/

		function registrar($nombre,$apellido,$telefono,$direccion,$banco,$tipoUsu,$usuario,$password){
			$pass=sha1($password);
			
			//HORA SISTEMA AL REGISTRARSE
			ini_set('date.timezone', 'America/Guatemala');
			$hora_sistema = date ('H:i:s', time());
			//FECHA SISTEMA AL REGISTRARSE
			ini_set('date.timezone', 'America/Guatemala');
			$fecha_sistema = date("d-m-Y");
						
			//TABLA EMPLEADOS
			$sql="INSERT INTO empleado
			VALUES(0,'$nombre','$apellido','$telefono','$direccion','$tipoUsu','$usuario','$pass',1,'$banco','$hora_sistema','$fecha_sistema')";
			if($this->conexion->conexion->query($sql)){
				return true;
			}
			else{
				return false;
			}					
			$this->conexion->cerrar();
		}

	
	}


	
?>