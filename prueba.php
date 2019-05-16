<?php
$conexion = new mysqli("localhost","root","","sistema_bancario");
/*
//FUNCION PARA CREAR CODIGOS QUE SERVIRÁ PARA OTRA CUENTA DEL CLIENTE	
$nombre = 'abel';	
$numero=5;								
$segundo = date ('s', time());
$minuto = date ('i', time());
$anio = date("Y");										
$cuenta_numCuenta = $numero.strlen($nombre).$segundo.$minuto.$anio;
//$cuenta_numCuenta = $id_clienteRegistrado.strlen($cuenta_nombre).$segundo.$minuto.$anio;
echo $cuenta_numCuenta;
*/
$id_tablaCuenta;	
	$cuenta_nombre;
	$consulta3 = ("SELECT id_chequeras, nombre FROM cuenta_clientes where id_clientes='48'");
	$resultado3 = $conexion->query($consulta3);
	if($row = $resultado3->fetch_assoc()){      
		$id_tablaCuenta =$row['id_chequeras'];	
        $cuenta_nombre=$row['nombre'];
        
        echo $id_tablaCuenta.$cuenta_nombre;
		}