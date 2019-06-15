<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../../img/icono.png">
    <title>Chequera</title>
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/timer.jquery.js"></script>
    <script src="js/timer.jquery.min.js"></script>
    <!-- <script src="js/botonesTemporizador.js"></script>-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">    
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<style>
     a{
        font-family: 'Roboto', sans-serif;
    }
</style>
</head>
<body>
    <!--PERMITE REDIRECCIONARLO AL LOGIN SI NO HAY SESION INICIADA -->
    <?php   
        session_start();      
        if(isset($_SESSION['user'])){
        }else{
            header("location:../../inicio.php");
        }
    ?>
    <!--PERMITE REDIRECCIONARLO AL LOGIN SI NO HAY SESION INICIADA -->
    <header style="background: #039b5c; display: flex;">
        <h4>            
            <span class="glyphicon glyphicon-arrow-left" style="margin-left:20px" aria-hidden="true">
            <a href="../index.php" style="color:white; ">Regresar</a> 
            </span>
        </h4>
    </header>

    <div class="container-fluid">
        <!--Cancha 1 -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2" >
                <div class="table-responsive" >
                    <table class="table table-striped table-bordered table-hover table-condensed ">
                        <!-- ENCABEZADOS DE LA TABLA -->
                                <h3 style="text-align:center">CHEQUERA</h3>                                
                            <tr class="success"  >
                                <th  class="alinearEncabezado" rowspan="1" >No. CHEQUE</th>
                                <th  class="alinearEncabezado" rowspan="1" >NOMBRE</th>
                                <th  class="alinearEncabezado" rowspan="1" >APELLIDO</th>
                                <th  class="alinearEncabezado" rowspan="1" >NUMERO DE CUENTA</th>
                                <th  class="alinearEncabezado" rowspan="1" >DOCUMENTO</th>
                                
                                <th style="text-align:center"  class="alinearEncabezado"  rowspan="1" >IMPRIMIR</th>                                                           
                            </tr>
                            <?php
                            // ------------VALIDARLO QUE MUESTRE LAS CHEQUERAS POR CADA BANCO LOGEADO ----------------
                                include("../conexion.php");
                                $query="SELECT numeros_cheques.estado, clientes.nombre, clientes.apellido,
                                        chequeras.numero_de_cuenta,
                                        numeros_cheques.nombre_documento, numeros_cheques.idnumeros_cheques 
                                
                                        FROM numeros_cheques
                                        inner join chequeras on chequeras.id_chequeras = numeros_cheques.chequera_id_numCheque
                                        inner join cuenta on cuenta.id_cuentas = chequeras.cuenta_id_chequera
                                        inner join clientes on clientes.id_clientes = cuenta.cliente_id_cuenta
                                        
                                        where numeros_cheques.estado=1  ";
                                $resultado=$con->query($query);
                                while($row=$resultado->fetch_assoc()){
                            ?>  
                                    
                                        <tr>
                                            <td> <?php echo $row['idnumeros_cheques']; ?> </td>
                                            <td> <?php echo $row['nombre']; ?> </td>
                                            <td> <?php echo $row['apellido']; ?> </td>
                                            <td>  <?php echo $row['numero_de_cuenta']; ?> 
                                            <td>  <?php echo $row['nombre_documento']; ?>  
                                            </td>                                          
                                            <!--UPDATE -->                                        
                                            <td> <a onclick="refreshLista()" target="_BLANK" type="button"class="btn btn-warning btn-block" href="index.php?delete=<?php echo $row['idnumeros_cheques']; ?>">
                                                <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                                                </a> 
                                            </td>                                        
                                        </tr>
                                
                            <?php      
                                }
                            ?>
                    </table>
                </div>
            </div>
        </div>

    </div>
<script>
    function refreshLista(){
        setTimeout("location.href='lista_chequera.php'", 5000);//refress page
    }
</script>
</body>
</html>