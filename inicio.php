

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/icono.png">
	<title>Mi Banco</title>

    <link rel="stylesheet" href="login/Resources/css/bootstrap.min.css">
</head>
<style>
    body{
    background: url(login/ironMan.jpg)no-repeat center fixed ;
    height: 600px;
    background-position: center center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    background-color: black; 
}
</style>
 
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
            <a href="inicio.php" class="navbar-brand" >SISTEMA BANCARIO</a>
        </div>

        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right" >
                <li><a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown">Identifícate</a>
                    <ul class="dropdown-menu">                        
                        <li ><a href="login/index.php" >EMPLEADO o ADMINISTRADOR</a></li>
                        <li ><a href="bancaElectronica/loginCliente.php" >Banca Electrónca</a></li>
                        <li ><a href="#" >Cajero Automático</a></li>
                    </ul>
                </li>
                <!-- <li ><a style="color:white" href="javascript:void(0)" data-toggle="modal" data-target="#responsive">Registrarse</a></li>-->
            </ul>
        </div>
    </nav>
   
       
	<script src="login/Resources/js/jquery-1.11.2.js"></script>
	<script src="login/Resources/js/bootstrap.min.js"></script>
    
 


    
</body>
</html>