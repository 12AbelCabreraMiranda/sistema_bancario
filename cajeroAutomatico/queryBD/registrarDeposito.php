<?php
   
   require_once ("../../crear_cuenta/conexion.php");
   session_start();

    $codigoTarjetaLogeado = $_SESSION['user'];    
    $cantidad_a_retirar = $_POST['cantidad'];
  
    $querySaldo = ("SELECT numero_de_cuenta,saldo_actual from vista_tarjeta_debito where codigo_tarjeta='$codigoTarjetaLogeado' ");
                    $resultSaldo =$con->query($querySaldo);
                    if($row = $resultSaldo->fetch_assoc()){
                        $saldoTarjetaDebito=$row['saldo_actual'];
                        $cuentaClienteTarjeta=$row['numero_de_cuenta'];
                    }

            
            if($cantidad_a_retirar==0){                
                echo '<div class="alert alert-warning alert-dismissible" role="alert" style="background-color: #f9e572">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Advertencia!  </strong>      Retire por lo menos Q.1.00  jajajajaja XD                        
                    </div>';
            }else if($cantidad_a_retirar>$saldoTarjetaDebito){
                if($saldoTarjetaDebito==0){
                   
                    echo '<div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>Advertencia! Su saldo está en cero  </strong>                              
                        </div>';
                }else if($saldoTarjetaDebito>0){
                    
                    echo '<div class="alert alert-warning alert-dismissible" role="alert" style="background-color: #f9e572">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>Advertencia!   </strong>   No tiene el dinero suficiente para Retirar   :(                           
                        </div>';
                        //no retirar mayor a 1000
                       if($cantidad_a_retirar>1000){
                            echo '<div class="alert alert-danger alert-dismissible" role="alert" >
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>Advertencia!   </strong>   No puedes retirar mayor a  Q. 1,000.00   :(                           
                                </div>';
                        }
                }
                
            }
            
            else if($cantidad_a_retirar<=$saldoTarjetaDebito){                                     
                    
                    //restar de mi saldo
                    $query5 = "UPDATE chequeras SET saldo_actual=saldo_actual-'$cantidad_a_retirar' where numero_de_cuenta='$cuentaClienteTarjeta' ";
                    $resultad5= $con->query($query5);

                    //tarjeta_debito                     
                    $querySelect = ("SELECT idtarjeta_debito from tarjeta_debito where codigo_tarjeta='$codigoTarjetaLogeado' ");
                    $resultSelect =$con->query($querySelect);
                    if($row = $resultSelect->fetch_assoc()){
                        $idTarjetaDebitoLogeado=$row['idtarjeta_debito'];
                    }

                    //HORA SISTEMA AL REGISTRARSE
                    ini_set('date.timezone', 'America/Guatemala');
                    $hora_sistema = date ('H:i:s', time());
                    //FECHA SISTEMA AL REGISTRARSE
                    ini_set('date.timezone', 'America/Guatemala');
                    $fecha_sistema = date("d-m-Y");                                           

                    $queryInsert  = "INSERT into cajero_automatico (tarjetaDebito_id_cajero, monto_retirar, hora_cajero, fecha_cajero) 
                            VALUES('$idTarjetaDebitoLogeado','$cantidad_a_retirar','$hora_sistema','$fecha_sistema')";
                    $resultadoInsert= $con->query($queryInsert);

                    echo '<div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>EXCELENTE..!  </strong> <br> 
                            Disfrute de su dinero retirado!!. <h2>💸 🍔🍔</h2>
                        </div>';                                            
                }                                                             
    
?>
