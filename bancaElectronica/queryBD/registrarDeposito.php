<?php
   
   require_once ("../../crear_cuenta/conexion.php");
   session_start();

    $usuarioLogeado = $_SESSION['user'];
    $passwordVirtual = $_SESSION['passV'];//implementado para ver saldo usu==   
    $cuenta_a_transferir = $_REQUEST["CuentaCliente"];
    $cantidadTransferido = $_POST['cantidad'];
    
    $idCuentaTransferir; 
     $query1 = ("SELECT id_cuentas FROM cuentaclientebanco where numero_de_cuenta='$cuenta_a_transferir'  ");
     $result1 = $con->query($query1);
     if($row = $result1->fetch_assoc()){        
        $idCuentaTransferir=$row['id_cuentas'];
     }
    
    $cuentaCLienteLogeado;
    $mi_saldoLogueado;
    $nombreClienteLog;
    $apellidoLog;
    $consulta = ("SELECT numero_de_cuenta, nombre,apellido, saldo_actual FROM cuenta_cliente_logueado where usuario_cliente='$usuarioLogeado' and contrasenia_cliente='$passwordVirtual' ");
    $resultado = $con->query($consulta);
    if($row = $resultado->fetch_assoc()){          
        $cuentaCLienteLogeado=$row['numero_de_cuenta'];//cuenta logueada
        $mi_saldoLogueado=$row['saldo_actual'];//saldo logueado
        $nombreClienteLog=$row['nombre'];//nomb cliente
        $apellidoLog=$row['apellido'];

        if($cuentaCLienteLogeado==$cuenta_a_transferir){        
        
            echo '<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Falló el registro!  </strong>  <br>
                    No se puede realizar la transferencia en tu misma cuenta... MUY LOCO ..  XD
                </div>';
        }else{   
            
            if($cantidadTransferido==0){                
                echo '<div class="alert alert-warning alert-dismissible" role="alert" style="background-color: #f9e572">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Advertencia!  </strong>      Transfiera por lo menos Q.1.00  jajajajaja XD                        
                    </div>';
            }else if($cantidadTransferido>$mi_saldoLogueado){
                if($mi_saldoLogueado==0){
                   
                    echo '<div class="alert alert-warning alert-dismissible" role="alert" style="background-color: #f9e572">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>Advertencia! Su saldo está en cero  </strong>                              
                        </div>';
                }else if($mi_saldoLogueado>0){
                    
                    echo '<div class="alert alert-warning alert-dismissible" role="alert" style="background-color: #f9e572">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>Advertencia!   </strong>   No tiene el dinero suficiente para transferir   :(                           
                        </div>';
                }
            }else if($cantidadTransferido<=$mi_saldoLogueado){
                    
                    //actualizar querys
                    //actualizar ya funciona pero falta validar mi saldo para poder transferir
                    $query2 = "UPDATE chequeras SET saldo_actual=saldo_actual+'$cantidadTransferido' where cuenta_id_chequera='$idCuentaTransferir' ";
                    $resultad2= $con->query($query2);   
                    
                    //restar de mi saldo
                    $query5 = "UPDATE chequeras SET saldo_actual=saldo_actual-'$cantidadTransferido' where numero_de_cuenta='$cuentaCLienteLogeado' ";
                    $resultad5= $con->query($query5);

                    //chequera 
                    $idChequera;
                    $querySelect = ("SELECT id_chequeras from chequeras where numero_de_cuenta='$cuenta_a_transferir' ");
                    $resultSelect =$con->query($querySelect);
                    if($row = $resultSelect->fetch_assoc()){
                        $idChequera=$row['id_chequeras'];
                    }

                    //HORA SISTEMA AL REGISTRARSE
                    ini_set('date.timezone', 'America/Guatemala');
                    $hora_sistema = date ('H:i:s', time());
                    //FECHA SISTEMA AL REGISTRARSE
                    ini_set('date.timezone', 'America/Guatemala');
                    $fecha_sistema = date("d-m-Y");                                           

                    $queryInsert  = "INSERT into transferencia (numeroCuenta_a_transferir,chequera_id_transaccion,monto_deTransaccion,cliente_que_transfiere,apellido_que_transfiere,cuenta_transfiere,hora_deTransaccion,fecha_deTransaccion) 
                            VALUES('$cuenta_a_transferir','$idChequera','$cantidadTransferido','$nombreClienteLog','$apellidoLog','$cuentaCLienteLogeado','$hora_sistema','$fecha_sistema')";
                    $resultadoInsert= $con->query($queryInsert);

                    echo '<div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>EXCELENTE..!  </strong> <br> 
                            La transferencia de saldo fue un éxito.
                        </div>';
    
                        
                }/*

            

            
                */
        }
    }
                    
        
     

    
?>
