<?php

    require_once ("../../crear_cuenta/conexion.php");
    $idNumeroCheques = $_REQUEST["idCheque"]; 
        
    //actualizar movimiento  de cheque
    $queryCheque = "UPDATE numeros_cheques SET movimiento='cobrado' where idnumeros_cheques='$idNumeroCheques' ";
    $resultadCheque= $con->query($queryCheque);

