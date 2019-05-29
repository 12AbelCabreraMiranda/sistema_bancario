<?php
   $con = new mysqli("localhost","root","","sistema_bancario");
   include('seguridad.php');
   session_start();

    $usuarioLogeado = $_SESSION['user'];
    $cuentaClienteLog = $_REQUEST["CuentaCliente"];
    //inlcude dompdf library
    require_once('dompdf/autoload.inc.php');
    use Dompdf\Dompdf;

    //prevenir, si no enviar
    if(!isset($_REQUEST['CuentaCliente']))dir();
        $idChequera;
        $id_clienteRegistrado;
        $id_empleadoLogeado;
        $cuenta_nombre;
        $apellidoCliente;
        $querySelect = ("SELECT id_chequeras, id_clientes, nombre, apellido, empleado_id_cuenta from cuenta_clientes where numero_de_cuenta='$cuentaClienteLog' ");
        $resultSelect =$con->query($querySelect);

        if($row = $resultSelect->fetch_assoc()){
            $idChequera=$row['id_chequeras'];
            $id_clienteRegistrado=$row['id_clientes'];
            $cuenta_nombre=$row['nombre'];
            $apellidoCliente=$row['apellido'];
            $id_empleadoLogeado=$row['empleado_id_cuenta'];
        }

        //VALIDAR REGISTRO EN EL MISMO BANCO ----------------------------->
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
        $query1 = ("SELECT id_cuentas, nombreBancoCliente FROM cuentaclientebanco where numero_de_cuenta='$cuentaClienteLog'  ");
        $result1 = $con->query($query1);
        if($row = $result1->fetch_assoc()){
            $clienteBancoConsultado=$row['nombreBancoCliente'];

            if($nombre_empleadoBancoLogeado==$clienteBancoConsultado){

                //FUNCION PARA CREAR CODIGOS QUE SERVIRÁ PARA pin
                $queryTop="SELECT idtarjeta_debito FROM tarjeta_debito ORDER BY idtarjeta_debito DESC LIMIT 1"; //EXTRAE TOP ID DE LA ENTIDAD
                $resultTop = $con->query($queryTop); 
                
                if($row = $resultTop->fetch_assoc()){
                    $idTopTarjetaD= $row['idtarjeta_debito'];
                } 
                
                //Variables 										
                $segundo = date ('s', time());
                $minuto = date ('i', time());
                $anio = date("Y");					
                //USUARIO  CODIGO DE TARJETA			
                $usu_clienteTD = $id_clienteRegistrado.strlen($cuenta_nombre).$anio.strlen($apellidoCliente).$idChequera;
                //PIN DE TARJETA DE DEBITO   
                $contraseaCLienteTD = $segundo.strlen($cuenta_nombre).$id_clienteRegistrado.$idTopTarjetaD;
                //ENCRIPTACIÓN DE PASSWORD                                  
                $pinEncriptado = SED::encryption($contraseaCLienteTD);

                //HORA SISTEMA AL REGISTRARSE
                ini_set('date.timezone', 'America/Guatemala');
                $hora_sistema = date ('H:i:s', time());
                //FECHA SISTEMA AL REGISTRARSE
                ini_set('date.timezone', 'America/Guatemala');
                $fecha_sistema = date("d-m-Y");

                //-------------VALIDACION DE USUARIOS POR CUENTAS----------------------
                $queryValidad = ("SELECT codigo_tarjeta from tarjeta_debito where codigo_tarjeta='$usu_clienteTD' and chequera_id_tdebito='$idChequera' ");
                $resultValidad =$con->query($queryValidad);
                
                if($row = $resultValidad->fetch_assoc()){
                    $usuClien= $row['codigo_tarjeta'];
                    echo 'Ya existe este dato.';
                }else{

                $queryInsert  = "INSERT into tarjeta_debito (cliente_id_tdebito, chequera_id_tdebito, codigo_tarjeta,pin_tarjeta,tipo_tarjeta,hora_solicitado,fecha_solicitado, empleado_id_atiende,estado) 
                                    VALUES('$id_clienteRegistrado','$idChequera','$usu_clienteTD','$pinEncriptado','debito','$hora_sistema','$fecha_sistema','$id_empleadoLogeado','Habilitado')";
                    $resultadoInsert= $con->query($queryInsert);

                    echo 'Datos creados para la tarjeta de débito con éxito';            
                    
                    //incluir modelo
                    ob_start();
                    require_once('pdf-template/welcome.php');
                    $template = ob_get_clean();


                    //usando pdf dompdf con classes
                    $dompdf = new Dompdf();
                    $dompdf->loadHtml($template);

                    //tamaño papel 
                    //$dompdf->setPaper('A4', 'landscape');
                    $dompdf->setPaper('letter', 'vertical');

                    //Render de html a pdf
                    $dompdf->render();

                    //salida de navegador
                    //$dompdf->stream('message-'.time());

                    //crea el pdf en el directorio
                    file_put_contents('pdfs/message-'.time().'.pdf', $dompdf->output());
                }

            }else{
                echo 'No se puede crear el registro porque esta cuenta no es de nuestro sistema!!!';
            }


        }





    