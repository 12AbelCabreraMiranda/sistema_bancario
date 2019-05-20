<?php
//$conexion = new mysqli("localhost","root","","sistema_bancario");
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
$cuenta_nombre='Abel';
$apellido='cabrera miranda';
$usu_clienteVirtual = 'mivirtual'.strlen($cuenta_nombre).strlen($apellido);
echo $usu_clienteVirtual;