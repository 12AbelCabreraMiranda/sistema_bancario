<?php
$conexion = new mysqli("localhost","root","","sistema_bancario");
include('crear_cuenta/codigoBancaVirtual/seguridad.php');
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
//SELECCION USUARIO para extraer id del maestro logeado
$pass;
$query = ("SELECT contrasenia_cliente FROM usuario_banca_virtual where idusuario_banca_virtual=71");
$resultado = $conexion->query($query);
if($row = $resultado->fetch_assoc()){      
    $pass =$row['contrasenia_cliente'];
 }


 //DESENCRIPTACIÓN DE PASSWORD
$passDesencriptado = SED::decryption($pass);
echo $passDesencriptado;