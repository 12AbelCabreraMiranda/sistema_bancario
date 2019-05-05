<?php
   
   require_once ("../../crear_cuenta/conexion.php");
   session_start();

    $usuarioLogeado = $_SESSION['user'];
    $cuentaCliente = $_REQUEST["CuentaCliente"];
    $cantidadRetirado = $_POST['cantidadRetirar'];
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
     $id_clienteRetiro;
     $query1 = ("SELECT id_cuentas, id_clientes, nombreBancoCliente FROM cuentaclientebanco where numero_de_cuenta='$cuentaCliente'  ");
     $result1 = $con->query($query1);
     if($row = $result1->fetch_assoc()){
         $idCuentaClienteDeposito=$row['id_cuentas'];
         $id_clienteRetiro=$row['id_clientes'];
        $clienteBancoConsultado=$row['nombreBancoCliente'];

        if($nombre_empleadoBancoLogeado==$clienteBancoConsultado){
            $idChequera;
            $saldo;
            $querySelect = ("SELECT id_chequeras, saldo_actual from chequeras where numero_de_cuenta='$cuentaCliente' ");
            $resultSelect =$con->query($querySelect);
            if($row = $resultSelect->fetch_assoc()){
                $idChequera=$row['id_chequeras'];
                $saldo=$row['saldo_actual'];
            }
            if($cantidadRetirado==0){                
                echo '<div class="alert alert-warning alert-dismissible" role="alert" style="background-color: #f9e572">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Advertencia! Retire por lo menos Q.1.00  </strong>                              
                    </div>';
            }
            else if($cantidadRetirado>$saldo){
                if($saldo==0){
                   
                    echo '<div class="alert alert-warning alert-dismissible" role="alert" style="background-color: #f9e572">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>Advertencia! Su saldo está en cero  </strong>                              
                        </div>';
                }else if($saldo>0){
                    
                    echo '<div class="alert alert-warning alert-dismissible" role="alert" style="background-color: #f9e572">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>Advertencia! No tiene el dinero solicitado para retirar  </strong>                              
                        </div>';
                }
            }else if($cantidadRetirado<=$saldo){
                
                //actualizar 
                $query2 = "UPDATE chequeras SET saldo_actual=saldo_actual-'$cantidadRetirado' where cuenta_id_chequera='$idCuentaClienteDeposito' ";
                $resultad2= $con->query($query2); 
                //HORA SISTEMA AL REGISTRARSE
                ini_set('date.timezone', 'America/Guatemala');
                $hora_sistema = date ('H:i:s', time());
                //FECHA SISTEMA AL REGISTRARSE
                ini_set('date.timezone', 'America/Guatemala');
                $fecha_sistema = date("d-m-Y");                                

                $queryInsert  = "INSERT into retiros (monto_retirado, cliente_id_retiro, chequera_id, hora_deRetiro, fecha_deRetiro, tipo_documento_retiro) 
                                VALUES('$cantidadRetirado','$id_clienteRetiro','$idChequera','$hora_sistema','$fecha_sistema','$tipoDocumento')";
                $resultadoInsert= $con->query($queryInsert);

                echo '<div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Éxito!  </strong>  
                        El Retiro fue un éxito de la cuenta del: <b>'.$clienteBancoConsultado.'.
                    </div>';
            }

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
