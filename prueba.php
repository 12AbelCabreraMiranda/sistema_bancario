<?php
//HORA SISTEMA AL REGISTRARSE
ini_set('date.timezone', 'America/Guatemala');
$hora_sistema = date ('H:i:s', time());
//FECHA SISTEMA AL REGISTRARSE
ini_set('date.timezone', 'America/Guatemala');
$fecha_sistema = date("d-m-Y");
echo $hora_sistema;
echo $fecha_sistema;