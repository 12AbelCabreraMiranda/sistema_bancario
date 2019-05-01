<?php
   
   require_once ("../../crear_cuenta/conexion.php");
   session_start();

    $usuarioLogeado = $_SESSION['user'];
    $cuentaCliente = $_REQUEST["CuentaCliente"];

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
     $query1 = ("SELECT * FROM cuentaclientebanco where nombreBancoCliente='$cuentaCliente' and nombreBancoCliente=='$nombre_empleadoBancoLogeado' ");
     $result1 = $con->query($query1);
     if($row = $result1->fetch_assoc()){

        echo 'Bancos iguales';
                    //actualizar si ya existe
        //$query2 = "UPDATE avancepuntos SET puntos=$suma+'$puntaje' where id_estudiante='$NombreCompleto' AND id_curso='$id_curso' ";
        //$resultad2= $conexion->query($query2); 
        
     }else{
            echo 'la cuenta no pertenece a nuestro sistema';
        }

    
?>
