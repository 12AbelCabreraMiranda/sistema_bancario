<?php
   
   require_once ("../../crear_cuenta/conexion.php");
   session_start();

    $usuarioLogeado = $_SESSION['user'];
    $cuentaCliente = $_REQUEST["CuentaCliente"];
    $cantidadDeposito = $_POST['cantidad'];

    $id_empleadoBancoLogeado;
   $consulta = ("SELECT banco_id_empleado FROM empleado where nombre='$usuarioLogeado'");
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
