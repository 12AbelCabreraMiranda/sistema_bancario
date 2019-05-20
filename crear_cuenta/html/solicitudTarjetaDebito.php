<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    


    
</head>
<body>
    
    <!--FORMULARIOS -->
    <div class="container" style="display:none" id="form_solicitudTarDebito">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading" style="background-color: #0ca9c9;color:white"><h4 class="text-center"> Solicitud de Tarjeta de Debito</h4></div>
                    <div class="panel-body" >        

                        <form action="solicitudTarjetaDebito.php" id="formBuscarCuenta" method="post" enctype="multipart/form-data">
                            <div class="container-fluid">
                                                            
                                <div class="input-group col-md-6 col-xs-12 ">
                                    <input REQUIRED name="numeroCuenta" type="text" class="form-control" placeholder="Número de cuenta" onkeypress="return soloNumero(event)" onpaste="return false"/>
                                    <span class="input-group-btn">
                                                                                    
                                        <input  onclick="buscarCuenta()" id="botonBuscar" type="submit" class="btn btn-info" value="Buscar"> 
                                                                                  
                                    </span>
                                </div> 
                            </div>
                        </form>

                        <form action="" method="post" id="formRegistrarDeposito" enctype="multipart/form-data">    
                            <div class="row">
                                <div class="container-fluid">
                                
                                    <div class="col-sm-7">
                                        <div class='col-sm-7'>                                                                                                                                                                                                                                   
                                            <p style="display:none" class="numCuentaCliente">numero cuenta para guardar deposito</p>                                   
                                        </div>                                        
                                    
                                        <div class="col-sm-12"> <!-- Respuesta de la base de datos-->   
                                            <div id="respuestaDepositado"></div>
                                        </div>
                                    </div>

                                    <div class='col-sm-5' id="datoCuenta" >
                                        <h4 class="text-center">Datos de la cuenta</h4>                                
                                        <p  class="nombreCliente">nombre </p>                                                                
                                    </div> 
                                    <div class=" pull-right">
                                        <center> <br>
                                            <input disabled onclick="registrarDeposito()" id="boton" type="submit" class="btn btn-info" value="Guardar">                       
                                        </center> 
                                    </div>
                                </div>
                            </div>                                                                                                                                                                               
                        </form>                                                    

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
    <script src="js/solicitudTarjeta.js"></script>
    

</body>
</html>