<?php
session_start();

$mysqli = new mysqli("localhost","root","","sistema_bancario"); 
$usuarioLogeado = $_SESSION['user'];

$consultaR = ("SELECT id_empleados, banco_id_empleado FROM empleado where usuario='$usuarioLogeado' ");
$resultadoR = $mysqli->query($consultaR);
if($row = $resultadoR->fetch_assoc()){      		
    $id_empleadoBanco=$row['banco_id_empleado'];
    $id_Usu_logeado=$row['id_empleados'];
}

$salida ="";
$query = "SELECT    clientes.nombre, clientes.apellido,
                    chequeras.numero_de_cuenta,
                    retiros.monto_retirado, retiros.hora_deRetiro, retiros.fecha_deRetiro,
                    tipo_documento.nombre_documento,
                    cuenta.banco_id

                    FROM retiros

                    inner join chequeras on chequeras.id_chequeras = retiros.chequera_id 
                    inner join cuenta on cuenta.id_cuentas = chequeras.cuenta_id_chequera
                    inner join clientes on clientes.id_clientes = retiros.cliente_id_retiro
                    inner join tipo_documento on tipo_documento.idtipo_documento = retiros.tipo_documento_retiro 

                    where banco_id = '$id_empleadoBanco'
                    order by retiros.fecha_deRetiro desc  ";

if(isset($_POST['consulta'])){
    $q = $mysqli->real_escape_string($_POST['consulta']);
    $query ="SELECT     clientes.nombre, clientes.apellido,
                        chequeras.numero_de_cuenta,
                        retiros.monto_retirado, retiros.hora_deRetiro, retiros.fecha_deRetiro,
                        tipo_documento.nombre_documento,
                        cuenta.banco_id

                    FROM retiros

                    inner join chequeras on chequeras.id_chequeras = retiros.chequera_id 
                    inner join cuenta on cuenta.id_cuentas = chequeras.cuenta_id_chequera
                    inner join clientes on clientes.id_clientes = retiros.cliente_id_retiro
                    inner join tipo_documento on tipo_documento.idtipo_documento = retiros.tipo_documento_retiro 

    where numero_de_cuenta like '%".$q."%' and banco_id = '$id_empleadoBanco'  ";
}
$resultado = $mysqli->query($query);
if($resultado->num_rows > 0){
    $salida.="<center> <div class='table-responsive'> <table class='tabla_datos table table-striped table-bordered table-hover table-condensed' style='margin-top:30px'>
                <thead>
                    <tr>
                        <td style='height:40px; background:#05936b; text-align:center; color:white'>NOMBRE</td>
                        <td style='height:40px; background:#05936b; text-align:center; color:white'>APELLIDO</td>
                        <td style='height:40px; background:#05936b; text-align:center; color:white'>NÚMERO DE CUENTA</td>
                        <td style='height:40px; background:#05936b; text-align:center; color:white'>MONTO RETIRADO</td>
                        <td style='height:40px; background:#05936b; text-align:center; color:white'>HORA REALIZADO</td>
                        <td style='height:40px; background:#05936b; text-align:center; color:white'>FECHA REALIZADO</td>
                        <td style='height:40px; background:#05936b; text-align:center; color:white'>DOCUMENTO USADO</td>
                    
                    <tr>
                <thead>
                <tbody>";
    while($fila = $resultado->fetch_assoc()){
        $salida.="<tr class='success'>
                    <td style='padding-top:10px; text-align:center'>".$fila['nombre']." </td>
                    <td style='padding-top:10px'>".$fila['apellido']." </td>
                    <td style='padding-top:10px'>".$fila['numero_de_cuenta']." </td>
                    <td style='padding-top:10px; text-align:center'>Q. ".$fila['monto_retirado']." </td>
                    <td style='padding-top:10px; text-align:center'>".$fila['hora_deRetiro']." </td>
                    <td style='padding-top:10px; text-align:center'>".$fila['fecha_deRetiro']." </td>
                    <td style='padding-top:10px; text-align:center'>".$fila['nombre_documento']." </td>
                   
                </tr>";
    }
    $salida.="</tbody></table> </div> </center>";

}else{
    $salida.='
            <div class="alert alert-warning alert-dismissible" role="alert" style="margin-top:10px">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>CUENTA NO ENCONTRADO!</strong>  Ingrese un número de cuenta que esté registrado en el sistema.
            </div>';
}
echo $salida;
$mysqli->close();
?>