<?php
   
   require_once ("../../crear_cuenta/conexion.php");
    session_start();
    $numCuenta =   $_POST["numeroCuenta"];    
    $usuarioLogeado = $_SESSION['user'];
    $tipoDocCuenta =   $_POST["tipoDoc"];   
    
    $id_empleadoBancoLogeado;
    $consulta = ("SELECT banco_id_empleado FROM empleado where usuario='$usuarioLogeado'");
    $resultado = $con->query($consulta);
    if($row = $resultado->fetch_assoc()){          
        $id_empleadoBancoLogeado=$row['banco_id_empleado'];
    }

   

        //SELECCION USUARIO para extraer id del maestro logeado   
        $query1 = ("SELECT numero_de_cuenta, id_tipo_cuenta, nombre_tipoCuenta,saldo_actual, nombre,apellido, nombreBancoCliente FROM cuentaClienteBanco where numero_de_cuenta='$numCuenta'");
        $result1 = $con->query($query1);
        if($row = $result1->fetch_assoc()){      
            $numCuenta =$row['numero_de_cuenta'];
            $nomCliente =$row['nombre'];
            $apellidoCliente=$row['apellido'];
            $nomBanco=$row['nombreBancoCliente'];
            $saldo=$row['saldo_actual'];
            $tipoCuenta=$row['nombre_tipoCuenta'];
            $idTipoCuenta=$row['id_tipo_cuenta'];

            if($tipoDocCuenta==$idTipoCuenta){
                echo ('No. de Cuenta: '.'<b>'.$numCuenta.'</b>'.'<br>Tipo de cuenta: '.'<b>'.$tipoCuenta.'</b>'.'<br>Cliente: '.'<b>'.$nomCliente.' '.$apellidoCliente.'</b>'.'<br>Banco: '.'<b>'.$nomBanco.'</b>'.'<br>Saldo: '.'<b>'.$saldo.'</b>');
            }else{
                    echo'Esta no es cuenta de MONETARIO';
                }
            
         }else{
            echo'no existe cuenta';
        }
    


?>

