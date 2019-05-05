<?php
   
   require_once ("../../crear_cuenta/conexion.php");
   session_start();

    $usuarioLogeado = $_SESSION['user'];
    $cuentaCliente = $_REQUEST["CuentaCliente"];
    $cantidadDeposito = $_POST['cantidad'];
    $tipoDocumento = $_POST['tipoDoc'];

    $id_empleadoBancoLogeado;
   $consulta = ("SELECT banco_id_empleado FROM empleado where usuario='$usuarioLogeado'");
   $resultado = $con->query($consulta);
   if($row = $resultado->fetch_assoc()){          
       $id_empleadoBancoLogeado=$row['banco_id_empleado'];
   }
   $nombre_empleadoBancoLogeado;
   $consulta2 = ("SELECT nombre_banco FROM banco where id_banco='$id_empleadoBancoLogeado'");
   $resultado2 = $con->query($consulta2);
   if($row = $resultado2->fetch_assoc()){          
       $nombre_empleadoBancoLogeado=$row['nombre_banco'];
   }

     //consulta del cliente
     $clienteBancoConsultado;   
     $idCuentaClienteDeposito; 
     $query1 = ("SELECT id_cuentas, nombreBancoCliente FROM cuentaclientebanco where numero_de_cuenta='$cuentaCliente'  ");
     $result1 = $con->query($query1);
     if($row = $result1->fetch_assoc()){
        $clienteBancoConsultado=$row['nombreBancoCliente'];
        $idCuentaClienteDeposito=$row['id_cuentas'];

        if($nombre_empleadoBancoLogeado==$clienteBancoConsultado){
        //actualizar 
        $query2 = "UPDATE chequeras SET saldo_actual=saldo_actual+'$cantidadDeposito' where cuenta_id_chequera='$idCuentaClienteDeposito' ";
        $resultad2= $con->query($query2); 

        //HORA SISTEMA AL REGISTRARSE
        ini_set('date.timezone', 'America/Guatemala');
        $hora_sistema = date ('H:i:s', time());
        //FECHA SISTEMA AL REGISTRARSE
        ini_set('date.timezone', 'America/Guatemala');
        $fecha_sistema = date("d-m-Y");
            
        $idChequera;
        $querySelect = ("SELECT id_chequeras from chequeras where numero_de_cuenta='$cuentaCliente' ");
        $resultSelect =$con->query($querySelect);
        if($row = $resultSelect->fetch_assoc()){
            $idChequera=$row['id_chequeras'];
        }

        $queryInsert  = "INSERT into depositos (chequera_id_deposito,monto_depositado,hora_deDeposito,fecha_deDeposito,tipo_documento_deposito) 
                        VALUES('$idChequera','$cantidadDeposito','$hora_sistema','$fecha_sistema','$tipoDocumento')";
        $resultadoInsert= $con->query($queryInsert);
            
            echo '<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Éxito!  </strong>  
                    El depósito fue un éxito a la cuenta del: <b>'.$clienteBancoConsultado.'.
                </div>';
        }else{                    
            echo '<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Falló el registro!  </strong>  
                    La cuenta es del: <b>"'.$clienteBancoConsultado.'".</b> No podemos realizar esta operación porque no pertenece en nuestro sistema.
                </div>';
        }
                    
        
     }

    
?>
