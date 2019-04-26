<?php
/*
//serie de fibonacci
    $fibonacci = array();
    $fibonacci[0] = 0;
    $fibonacci[1] = 1;
     
    for ($i = 2; $i < 50; $i++) {
      $fibonacci[$i] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
    }    
    print array_sum($fibonacci);
 //serie de fibonacci   
*/  

    //FUNCION PARA CREAR CODIGOS QUE SERVIRÁ PARA CUENTAS DE BANCO
    $id=1;
    $nombre = 'Abel Cabrera';
    $segundo = date ('s', time());
    $minuto = date ('i', time());
    $anio = date("Y");

    $hora_sistema = date ('H:i:s', time());
    //echo 'tamaño de caracter: '.strlen($nombre).$anio." ".$edad;

    $cuenta = $id.strlen($nombre)." ".$segundo." ".$minuto." ".$anio;
    echo 'tamaño de caracter: '.$cuenta;