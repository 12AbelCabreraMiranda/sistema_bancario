<?php 
        require_once ("crear_cuenta/conexion.php");
        session_start();
        
        $usuarioLogeado = $_SESSION['user'];
    
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
        //COMOBOX
        $conexion = new mysqli("localhost","root","","sistema_bancario");

        $queryBanco = "select id_banco, nombre_banco from banco";
        $resultadoBanco = $con->query($queryBanco);

        $queryUsuarioTipo = "select idtipo_usuario, nombre_tipo from tipo_usuario";
        $resultadoUsuarioTipo = $con->query($queryUsuarioTipo);
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mi Banco</title>
    <link rel="icon" href="img/icono.png">
    <link rel="stylesheet" href="login/Resources/css/bootstrap.min.css">

</head>
 
<body>
    <?php       
        if(isset($_SESSION['user'])){
        }else{
            header("location:/login/index.php");
        }
    ?>

    <!--Barra de Navegacion-->
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Cambiar Navegacion</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="administrador.php" class="navbar-brand">Sistema Bancario: <?php  echo $row['nombre_banco']; ?></a>
        </div>

        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['user']; ?></a>
                    <ul class="dropdown-menu">
                        <li><a href="javascript: void(0)" onclick='cerrar();'>Cerrar Session</a></li>

                        <li ><a href="javascript:void(0)" data-toggle="modal" data-target="#responsive">Registrar Empleado</a></li>
                    </ul>
                </li>
                
            </ul>
        </div>
    </nav>
    <!-- Registrar empleados modal-->
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
                                <?php while($row = $resultadoBanco->fetch_assoc()){  ?>
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
                                <?php while($row = $resultadoUsuarioTipo->fetch_assoc()){  ?>
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

    
    <center>
        <div class="panel-heading">Bienvenido</div>
                            
        <h1>Módulo ADMINISTRADOR DEL SISTEMA</h1>

    </center>
     
    <script src="login/Resources/js/jquery-1.11.2.js"></script>
    <script src="login/Resources/js/bootstrap.min.js"></script>
    
    <script>
        function cerrar()
        {
            $.ajax({
                url:'login/Models/usuario.php',
                type:'POST',
                data:"boton=cerrar"
            }).done(function(resp){
                location.href = 'login/index.php'
            });
        }
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
                    url:'login/Models/usuario.php',
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

    