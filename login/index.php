<?php
    $conexion = new mysqli("localhost","root","","sistema_bancario");

    $query = "select id_banco, nombre_banco from banco";
    $resultado = $conexion->query($query);

    $query2 = "select idtipo_usuario, nombre_tipo from tipo_usuario";
    $resultado2 = $conexion->query($query2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../img/icono.png">
	<title>Mi Banco</title>

    <link rel="stylesheet" href="Resources/css/bootstrap.min.css">
</head>
 
<body>
    <!--Barra de Navegacion-->
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Cambiar Navegacion</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand" >Sistema Bancario</a>
        </div>

        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right" >
                <li><a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown">Identifícate</a>
                    <ul class="dropdown-menu">                        
                        <li ><a href="index.php" >EMPLEADO</a></li>
                        <li ><a href="../bancaElectronica/loginCliente.php" >CLIENTE</a></li>
                    </ul>
                </li>
                <!-- <li ><a style="color:white" href="javascript:void(0)" data-toggle="modal" data-target="#responsive">Registrarse</a></li>-->
            </ul>
        </div>
    </nav>
    <div class="container" style="margin-top:120px">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Iniciar Sesion</div>
                    <div class="panel-body">
                        
                    


                        <form role="form" id="login_form">
                            <div class="form-group">
                                <label for="usu">Usuario:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    <input REQUIRED type="text" class="form-control" name="user" id="user" placeholder="Usuario">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="contrasenia">Contraseña</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
                                    <input REQUIRED type="password" class="form-control" name="password" id="password" placeholder="Contrasenia">
                                </div>
                            </div>                    
                            <button type="button" name="login" id="login" class="btn btn-primary"><span class="glyphicon glyphicon-lock"></span> Entrar</button>   
                        
                        </form>
                    </div>
                    <div class="alert alert-danger text-center" style="display:none;" id="result">
                        <p>Usuario o Contraseña no identificados</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.Registrar empleados modal MIGRADO A OTRO MODULO-->
        <div class="modal fade" id="responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="modal-title">Datos de Usuario</h2>
              </div>
              <div class="modal-body">
                <div class="alert alert-success text-center" id="exito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span> Su cuenta ha sido registrada</span>
                </div>
                <div class="alert alert-danger text-center" id="no_exito" style="display:none;">
                  <span class="glyphicon glyphicon-ok"> </span><span> Ya existe este usuario</span>
                </div>
                <form class="form-horizontal" id="formCliente">
                  <div class="form-group">
                    <label for="nombres" class="control-label col-xs-5">Nombres :</label>
                    <div class="col-xs-5">
                      <input REQUIRED id="nombres" name="nombres" type="text" class="form-control" placeholder="Ingrese sus Nombres">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="apellidos" class="control-label col-xs-5">Apellidos :</label>
                    <div class="col-xs-5">
                      <input REQUIRED id="apellidos" name="apellidos"  type="text" class="form-control" placeholder="Ingrese sus Apellidos">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="telefono" class="control-label col-xs-5">Telefono :</label>
                    <div class="col-xs-5">
                      <input REQUIRED id="telefono" name="telefono"  type="text" class="form-control" placeholder="Ingrese su teléfono">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="direccion" class="control-label col-xs-5">Dirección :</label>
                    <div class="col-xs-5">
                      <input REQUIRED id="direccion" name="direccion"  type="text" class="form-control" placeholder="Ingrese su dirección">
                    </div>
                  </div>

                    <div class="form-group" >
                        <label class="control-label col-xs-5">SELECCIONAR BANCO :</label>
                        <div class="col-xs-5">
                            <select name="banco" class="form-control col-xs-5"  id="banco_id">
                                <?php while($row = $resultado->fetch_assoc()){  ?>
                                    <option  value="<?php echo $row['id_banco']; ?> ">
                                        <?php  echo $row['nombre_banco']; ?>                                             
                                    </option>
                                <?php }?>
                            </select> 
                        </div>
                    </div> 

                    <div class="form-group"> 
                        <label class="control-label col-xs-5">SELECCIONAR TIPO USUARIO </label>
                        <div class="col-xs-5">
                            <select name="tipo_usuario" class="form-control"  id="tipo_usuario_id">
                                <?php while($row = $resultado2->fetch_assoc()){  ?>
                                    <option value="<?php echo $row['idtipo_usuario']; ?> ">
                                        <?php  echo $row['nombre_tipo']; ?>                                             
                                    </option>
                                <?php }?>
                            </select> 
                        </div> 
                    </div> 

                  <div class="form-group">
                        <label for="usuario" class="control-label col-xs-5">Nombre de Usuario:</label>
                        <div class="col-xs-5">
                            <input REQUIRED id="usuario" name="usuario" type="text" class="form-control" placeholder="Ingrese su usuario">
                        </div>
                  </div>
                  <div class="form-group">
                    <label for="pass" class="control-label col-xs-5">Contraseña:</label>
                    <div class="col-xs-5">
                        <input REQUIRED id="pass" name="pass" type="password" class="form-control" placeholder="Ingrese su contraseña">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pass2" class="control-label col-xs-5">Repetir Contraseña:</label>
                    <div class="col-xs-5">
                        <input REQUIRED id="pass2" name="pass2" type="password" class="form-control" placeholder="Repetir contraseña">
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">  
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button onclick="registrar();" type="button" class="btn btn-success">Guardar</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
       
	<script src="Resources/js/jquery-1.11.2.js"></script>
	<script src="Resources/js/bootstrap.min.js"></script>
    
    <script>
        //FUNCION DE AUTENTICACIÓN DE USUARIOS
    $(document).ready(function() {
        $('#login').click(function(){
        var user = $('#user').val();
        var pass = $('#password').val();
        if($.trim(user).length > 0 && $.trim(pass).length > 0){
            $.ajax({
            url:"logueame.php",
            method:"POST",
            data:{user:user, pass:pass},
            cache:"false",
            beforeSend:function() {
                $('#login').val("Conectando...");
            },
            success:function(data) {
                //Esta función permite mantener por 3 segundos el mensaje de alerta guardado con exito
                $("#result").css('display', 'none');
                    setTimeout(function() {                
                        $("#result").fadeOut(1500);
                        //limpiar los campos de textos                  
                        $("#login_form")[0].reset().fadeOut(1500);
                    },3000); 
                //Esta función permite mantener por 3 segundos el mensaje de alerta guardado con exito

                $('#login').val("Login");
                if (data=="1") {
                $(location).attr('href','../administrador.php');
                }
                if (data=="2") {
                $(location).attr('href','../receptorPagador/receptorPagador.php');
                }
                if (data=="3") {
                $(location).attr('href','../secretaria/secretaria.php');
                }
                if (data=="4") {
                $(location).attr('href','../crear_cuenta/index.php');
                }
                                                
                if (data!=="1" && data!=="2" && data!=="3" && data!=="4") {   //si no reconoce ningun usuario registrado, muestra alerta             
                $("#result").show();
                    
                }

            }
            });
        };
        });
    });
    </script>


    <script>
        /*function confirmar(){//Esta funcion no está en funcionalidad
            var usu = $('#usu').val();
            var contrasenia = $('#contrasenia').val();
            $.ajax({
                url:'Models/usuario.php',
                type:'POST',
                data:'usu='+usu+'&contrasenia='+contrasenia+"&boton=ingresar"
            }).done(function(resp){
                if(resp=='0'){
                    $('#error').show();
                }
                else{
                    location.href='../administrador.php';
                }
               
            });
        }*/

        function registrar(){
            var nombres = $('#nombres').val();
            var apellidos = $('#apellidos').val();
            var telefono = $('#telefono').val();
            var direccion = $('#direccion').val();
            var banco =$('#banco_id').val();
            var tipo_usuario =$('#tipo_usuario_id').val();
            var usuario = $('#usuario').val();
            var password = $('#pass').val();
            var password2 = $('#pass2').val();
            if (password===password2) {

                //Esta función permite mantener por 3 segundos el mensaje de alerta guardado con exito
                $("#exito").css('display', 'none');
                setTimeout(function() {                
                    $("#exito").fadeOut(1500);
                    //limpiar los campos de textos                  
                    $("#formCliente")[0].reset().fadeOut(1500);
                },3000); 
                //Esta función permite mantener por 3 segundos el mensaje de alerta  no guardado
                $("#no_exito").css('display', 'none');
                setTimeout(function() {                
                    $("#no_exito").fadeOut(1500);
                    //limpiar los campos de textos                  
                    $("#formCliente")[0].reset().fadeOut(1500); 
                },3000); 
                                    
                
                
                $.ajax({
                    url:'Models/usuario.php',
                    type:'POST',
                    data:'nombres='+nombres+'&apellidos='+apellidos+ '&telefono='+telefono+ '&direccion='+direccion+ '&banco='+banco+ '&tipoUsuario='+tipo_usuario+ '&usuario='+usuario+'&password='+password+'&boton=registrar'
                }).done(function(resp){
                    if (resp==='exito') {
                        $('#exito').show();                                    
                    }
                    else{
                        $('#no_exito').show();
                        //alert(resp);                                    
                    }
                });
            }
            else{
                alert('no son iguales');
            }
        }
        
    </script>
</body>
</html>