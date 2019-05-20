<?php
   
   require_once ("../conexion.php");
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
    $nomCliente;
    $apellidoCliente;
    $numCuenta;
    $nomBanco;
    $query1 = ("SELECT numero_de_cuenta, nombre,apellido, nombreBancoCliente FROM cuentaClienteBanco where numero_de_cuenta='$numCuenta'");
    $result1 = $con->query($query1);
    if($row = $result1->fetch_assoc()){      
        $numCuenta =$row['numero_de_cuenta'];
        $nomCliente =$row['nombre'];
        $apellidoCliente=$row['apellido'];
        $nomBanco=$row['nombreBancoCliente'];
        echo ('No. de Cuenta: '.'<b>'.$numCuenta.'</b>'.'<br>Cliente: '.'<b>'.$nomCliente.' '.$apellidoCliente.'</b>'.'<br>Banco: '.'<b>'.$nomBanco.'</b>');
     }else{
        echo'no existe cuenta';
    }


?>

