<?php    
    session_start();   
        if(isset($_SESSION['user'])){
        }else{
            header("location:../inicio.php");
        }
    ?>
<!DOCTYPE html>
<html class="csstransforms no-csstransforms3d csstransitions"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>CAJERO AUTOMÁTICO</title>
	<link rel="stylesheet" type="text/css" href="menu_nav/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="menu_nav/css/menu.css">
    
	<script type="text/javascript" src="menu_nav/js/jquery.js"></script>
	<script type="text/javascript" src="menu_nav/js/function.js"></script>

</head>
<body>
<div style="background:#0099cc; font-size:26px; text-align:center; color:#FFF; font-weight:bold; height:60px; padding-top:20px;">CAJERO AUTOMÁTICO</div>
<div id="wrap">
	<div id="nav_header">
		<div class="inner relative">
			<a class="logo" href="#"><img src="menu_nav/images/cajero.png"  alt="fresh design web"></a>
			<a id="menu-toggle" class="button dark" href="#"><i class="icon-reorder"></i></a>
			<nav id="navigation">
				<ul id="main-menu">
					<li class="current-menu-item"><a href="#">CÓDIGO DE TARJETA DÉBITO INSERTADO--></a></li>
									
					<li class="parent">
						<a href="#"><?php echo $_SESSION['user']; ?> </a>
						<ul class="sub-menu">
							<li><a href="javascript: void(0)"  onclick='cerrar();'>Cerrar Sesión</a></li>						
						</ul>
					</li>
					
				</ul>
			</nav>
			<div class="clear"></div>
		</div>
	</div>	
</div>    
</body></html>