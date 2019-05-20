<?php
$con = new mysqli("localhost","root","","sistema_bancario");

	$cuenta_nombre = $_POST["name"];
	$cuenta_apellido = $_POST["apellido"];
	$cuenta_dpi = $_POST["dpi"];
	$cuenta_nit = $_POST["nit"];
	$cuenta_telefono = $_POST["telefono"];
	$cuenta_direccion =$_POST["direccion"];			
		
	$dpi;
	$consulta1 = ("SELECT dpi FROM prueba where dpi='$cuenta_dpi'");
	$resultado1 = $con->query($consulta1);
	if($row = $resultado1->fetch_assoc()){      
		$dpi =$row['dpi'];
		echo 'ya existe';
	}	else{

					
		// Registro en la BD
		$sql = "INSERT INTO prueba(nombre, apellido, dpi, nit, telefono, direccion) 
				VALUES ('$cuenta_nombre','$cuenta_apellido','$cuenta_dpi','$cuenta_nit','$cuenta_telefono','$cuenta_direccion')";
		//$query = mysqli_query($con,$sql);
		$query= $con->query($sql);
		
		if($query){
			echo 'insertado';
		}
	}
?>