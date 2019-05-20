<?php
   
   require_once ("../crear_cuenta/conexion.php");
   session_start();

    $usuarioLogeado = $_SESSION['user'];
    $cuentaCliente = $_REQUEST["CuentaCliente"];

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
     $query1 = ("SELECT id_cuentas, nombreBancoCliente FROM cuentaclientebanco where numero_de_cuenta='$cuentaCliente'  ");
     $result1 = $con->query($query1);
     
     if($row = $result1->fetch_assoc()){
        $clienteBancoConsultado=$row['nombreBancoCliente'];
        $idCuentaClienteDeposito=$row['id_cuentas'];

        //CONDICION ---> Validando banco
        if($nombre_empleadoBancoLogeado==$clienteBancoConsultado){
        
            //FUNCION PARA CREAR CODIGOS QUE SERVIRÁ PARA OTRA CUENTA DEL CLIENTE
            $selectquery="SELECT idusuario_banca_virtual FROM usuario_banca_virtual ORDER BY idusuario_banca_virtual DESC LIMIT 1"; //EXTRAE TOP ID DE LA ENTIDAD
            $result = $con->query($selectquery); 
            
            if($rows = $result->fetch_assoc()){
                $idTopBancaVirtual= $rows['idusuario_banca_virtual'];
            } 
            //Variables 										
            $segundo = date ('s', time());
            $minuto = date ('i', time());
            $anio = date("Y");										
            $codigo_tarjetaDebito = $id_clienteRegistrado.strlen($cuenta_nombre).$segundo.$minuto.$anio.$idTopBancaVirtual;

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

            $queryInsert  = "INSERT into usuario_banca_virtual (codigo_tarjeta,cliente_id_virtual,chequera_id_virtual,usuario_cliente,contrasenia_cliente,tipoUsu,hora_solicitado,fecha,solicitado, empleado_id_creaSolicitud,estado) 
                            VALUES('$idChequera','$cantidadDeposito','$hora_sistema','$fecha_sistema','$tipoDocumento','Habilitado')";
            $resultadoInsert= $con->query($queryInsert);
                
                echo '<div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Éxito!  </strong>  
                        La solicitud de Tarjeta de Débito fue creada.
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
