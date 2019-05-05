<?php
   
   require_once ("../../crear_cuenta/conexion.php");
    session_start();
    $numCuenta =   $_POST["numeroCuenta"];    
    $usuarioLogeado = $_SESSION['user'];

    
    $id_empleadoBancoLogeado;
    $consulta = ("SELECT banco_id_empleado FROM empleado where usuario='$usuarioLogeado'");
    $resultado = $con->query($consulta);
    if($row = $resultado->fetch_assoc()){          
        $id_empleadoBancoLogeado=$row['banco_id_empleado'];
    }


    //SELECCION USUARIO para extraer id del maestro logeado
    $nomClienteCuenta;
    $query1 = ("SELECT numero_de_cuenta FROM cuentaClienteBanco where numero_de_cuenta='$numCuenta'");
    $result1 = $con->query($query1);
    if($row = $result1->fetch_assoc()){      
        $nomClienteCuenta =$row['numero_de_cuenta'];
        echo $nomClienteCuenta;
     }else{
        echo'no existe cuenta';
    }


?>

