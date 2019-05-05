<?php
   
   require_once ("../../crear_cuenta/conexion.php");
   session_start();

    $usuarioLogeado = $_SESSION['user'];
    $cuenta_a_transferir = $_REQUEST["CuentaCliente"];
    $cantidadTransferido = $_POST['cantidad'];
    
    $idCuentaTransferir; 
     $query1 = ("SELECT id_cuentas FROM cuentaclientebanco where numero_de_cuenta='$cuenta_a_transferir'  ");
     $result1 = $con->query($query1);
     if($row = $result1->fetch_assoc()){        
        $idCuentaTransferir=$row['id_cuentas'];
     }
    
    $cuentaCLienteLogeado;
    $consulta = ("SELECT numero_de_cuenta FROM cuenta_cliente_logueado where usuario_cliente='$usuarioLogeado'");
    $resultado = $con->query($consulta);
    if($row = $resultado->fetch_assoc()){          
        $cuentaCLienteLogeado=$row['numero_de_cuenta'];

        if($cuentaCLienteLogeado==$cuenta_a_transferir){        
        
            echo '<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Falló el registro!  </strong>  <br>
                    No se puede realizar la transferencia en tu misma cuenta... MUY LOCO ..  XD
                </div>';
        }else{   
            //actualizar ya funciona pero falta validar mi saldo para poder transferir
            //$query2 = "UPDATE chequeras SET saldo_actual=saldo_actual+'$cantidadTransferido' where cuenta_id_chequera='$idCuentaTransferir' ";
            //$resultad2= $con->query($query2);                  
            echo '<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>EXCELENTE..!  </strong> <br> 
                    La transferencia de saldo fue un éxito.
                </div>';

                /*
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
                */
        }
    }
                    
        
     

    
?>
