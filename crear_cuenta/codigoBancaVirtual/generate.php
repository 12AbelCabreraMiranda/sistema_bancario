<?php
   $con = new mysqli("localhost","root","","sistema_bancario");
   

    $cuentaClienteLog = $_REQUEST["vista_NumCuentaCliente"];
    //inlcude dompdf library
    require_once('dompdf/autoload.inc.php');
    use Dompdf\Dompdf;

    //prevenir, si no enviar
    if(!isset($_REQUEST['vista_NumCuentaCliente']))dir();
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

        //FUNCION PARA CREAR CODIGOS QUE SERVIRÁ PARA CONTRASEÑA CLIENTE
        $queryTop="SELECT idusuario_banca_virtual FROM usuario_banca_virtual ORDER BY idusuario_banca_virtual DESC LIMIT 1"; //EXTRAE TOP ID DE LA ENTIDAD
        $resultTop = $con->query($queryTop); 
        
        if($row = $resultTop->fetch_assoc()){
            $idTopBancaVirtual= $row['idusuario_banca_virtual'];
        } 
        //USUARIO   
        $usu_clienteVirtual = 'mivirtual'.strlen($cuenta_nombre).strlen($apellidoCliente);

        //Variables 										
        $segundo = date ('s', time());
        $minuto = date ('i', time());
        $anio = date("Y");										
        $contraseaCLienteVirtual = $id_clienteRegistrado.strlen($cuenta_nombre).$segundo.$minuto.$anio.$idTopBancaVirtual;

        //HORA SISTEMA AL REGISTRARSE
        ini_set('date.timezone', 'America/Guatemala');
        $hora_sistema = date ('H:i:s', time());
        //FECHA SISTEMA AL REGISTRARSE
        ini_set('date.timezone', 'America/Guatemala');
        $fecha_sistema = date("d-m-Y");

        $queryValidad = ("SELECT usuario_cliente from usuario_banca_virtual where usuario_cliente='$usu_clienteVirtual' ");
        $resultValidad =$con->query($queryValidad);
        
        if($row = $resultValidad->fetch_assoc()){
            $usuClien= $row['usuario_cliente'];
            echo 'Ya tienes usuario y contraseña para este numero de cuenta.';
        }else{

           $queryInsert  = "INSERT into usuario_banca_virtual (cliente_id_virtual, chequera_id_virtual, usuario_cliente,contrasenia_cliente,tipoUsu,hora_solicitado,fecha_solicitado, empleado_id_creaSolicitud,estado) 
                            VALUES('$id_clienteRegistrado','$idChequera','$usu_clienteVirtual','$contraseaCLienteVirtual','cliente','$hora_sistema','$fecha_sistema','$id_empleadoLogeado','Habilitado')";
            $resultadoInsert= $con->query($queryInsert);

            echo 'Usuario y Contraña para Banca Electronica creado exitosamente';

            
            
            //inlude template

            ob_start();
            require_once('pdf-template/welcome.php');
            $template = ob_get_clean();

            /*//inlcude dompdf library
            require_once('dompdf/autoload.inc.php');
            use Dompdf\Dompdf;*/

            //using pdf dompdf class
            $dompdf = new Dompdf();
            $dompdf->loadHtml($template);

            //set papger size 
            $dompdf->setPaper('A4', 'landscape');

            //Render the html to pdf
            $dompdf->render();

            //ouput to browser
            //$dompdf->stream('message-'.time());

            //write pdf to directory
            file_put_contents('pdfs/message-'.time().'.pdf', $dompdf->output());
        }
         
    