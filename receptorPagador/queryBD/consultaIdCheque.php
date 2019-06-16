<?php
   
   require_once ("../../crear_cuenta/conexion.php");
    session_start();
    $numCheque =   $_POST["numeroCuenta"];    
    $usuarioLogeado = $_SESSION['user'];
    $tipoDocCuenta =   $_POST["tipoDoc"]; 
    
    $id_empleadoBancoLogeado;
    $consulta = ("SELECT banco_id_empleado FROM empleado where usuario='$usuarioLogeado'");
    $resultado = $con->query($consulta);
    if($row = $resultado->fetch_assoc()){          
        $id_empleadoBancoLogeado=$row['banco_id_empleado'];
    }

    
        //SELECCION USUARIO para extraer id del maestro logeado        
        $query1 = ("SELECT numero_de_cuenta, id_tipo_cuenta, idnumeros_cheques FROM vista_cheque_monetaria where numeroCheque='$numCheque'");
        $result1 = $con->query($query1);
        if($row = $result1->fetch_assoc()){      
            
            $idTipoCuenta=$row['id_tipo_cuenta'];
            $idNumCheque=$row['idnumeros_cheques'];

            if($tipoDocCuenta==$idTipoCuenta){
                echo $idNumCheque;
            }else{
                    echo '';
                }

         }else{
            echo'no existe cuenta';
        }
    


?>

