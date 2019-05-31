<?php require_once "pagination-controller.php"; ?>
<?php $page = (isset($_GET["page"])) ? $_GET["page"] : 1; ?>
<?php Pagination::config($page, 6, "visa_movimiento_cajero", null , 5); ?>
<?php $data = Pagination::data(); ?>
<?php $active = ""; ?>
<?php if ($data["error"]): header("location: ruta/error.php"); endif;?>

	<?php    
    	  
        if(isset($_SESSION['user'])){
        }else{
            header("location:../inicio.php");
        }
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Paginación con PHP</title>		
	<link rel="stylesheet" href="main.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../menu_nav/css/menu.css">
    
	<script type="text/javascript" src="../menu_nav/js/jquery.js"></script>
	<script type="text/javascript" src="../menu_nav/js/function.js"></script>
</head>
<body>

	<div style="background:#0099cc; font-size:26px; text-align:center; color:#FFF; font-weight:bold; height:60px; padding-top:20px;">CAJERO AUTOMÁTICO</div>
	<div id="wrap">
		<div id="nav_header">
			<div class="inner relative">
				<a class="logo" href="#"><img src="../menu_nav/images/cajero.png"  alt="fresh design web"></a>
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


	<div class="main-container" id="movimiento" style="display:show">				

		<div class="alert alert-warning alert-dismissible" role="alert" >			
			<button type="button" class="close"  aria-label="Close" onclick="boton_movimiento()">
				INICIO
			</button>
			<strong >MOVIMIENTOS DE MI TARJETA  </strong>                            
		</div>
					

		<table class="table table-bordered table-hover table-dark" style="background: white">			
			<thead>
				<tr >
					<th class="text-center">CÓDIGO DE TARJETA </th>
					<th class="text-center">MONTO RETIRADO Q.</th>
					<th class="text-center">HORA RETIRADO</th>
					<th class="text-center">FECHA RETIRADO</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach (Pagination::show_rows("Fecha_retirado") as $row): ?>
		    	<tr>
			        <td><?php echo $row["codigo_tarjeta"]; ?></td>
			        <td><?php echo $row["Monto_Retirado"]; ?></td>
					<td><?php echo $row["Hora_Retirado"]; ?> </td>
					<td><?php echo $row["Fecha_retirado"]; ?></td>
		    	</tr>
		    	<?php endforeach; ?>					
			</tbody>				
		</table>		

		<nav>
		  	<ul class="pagination" >
		  		<?php if ($data["actual-section"] != 1): ?> 		  			
		    		<li><a href="pagination-view.php?page=1">Inicio</a></li>
		    		<li><a href="pagination-view.php?page=<?php echo $data['previous']; ?>">&laquo;</a></li>
				<?php endif; ?>

				<?php for ($i = $data["section-start"]; $i <= $data["section-end"]; $i++): ?>					
				<?php if ($i > $data["total-pages"]): break; endif; ?>
				<?php $active = ($i == $data["this-page"]) ? "active" : ""; ?>			    
			    	<li class="<?php echo $active; ?>">
					<a href="pagination-view.php?page=<?php echo $i; ?>">
						<?php echo $i; ?>			    		
					</a>
			    	</li>
			    	<?php endfor; ?>
				
				<?php if ($data["actual-section"] != $data["total-sections"]): ?>
			    	<li><a href="pagination-view.php?page=<?php echo $data['next']; ?>">&raquo;</a></li>
			    	<li><a href="pagination-view.php?page=<?php echo $data['total-pages']; ?>">Final</a></li>
		    		<?php endif; ?>
		  	</ul>
		</nav>					
		
	</div>
	<script src="../js/evento.js"></script>

	<script>
        function cerrar()
        {
            $.ajax({
                url:'../../login/Models/usuario.php',
                type:'POST',
                data:"boton=cerrar"
            }).done(function(resp){
                location.href = '../../inicio.php'
            });
        }
    </script>
</body>
</html>

