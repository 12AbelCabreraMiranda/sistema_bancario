<?php 
    session_start();
    if(!isset($_SESSION["user"])){
    header("location:login/index.php");
    }

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
    <!--Barra de Navegacion-->
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Cambiar Navegacion</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">Sistema Bancario</a>
        </div>

        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['user']; ?></a>
                     <ul class="dropdown-menu">
                        <li><a href="javascript: void(0)" onclick='cerrar();'>Cerrar Session</a></li>
                     
                    </ul>
                </li>
                
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Bienvenido</div>
                    <div class="panel-body">                     
                      <h1>Módulo ADMINISTRADOR DEL SISTEMA</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
</body>
</html>

    