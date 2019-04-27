<?php
	
	/* Connect To Database*/
	require_once ("../conexion.php");
	session_start();
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
		$usuarioLogeado = $_SESSION['user'];
		//SELECCION USUARIO para extraer id del logeado
		$id_logeado;
		$id_empleadoBanco;
		$consulta1 = ("SELECT banco_id_empleado FROM empleado where nombre='$usuarioLogeado'");
		$resultado1 = $con->query($consulta1);
		if($row = $resultado1->fetch_assoc()){      		
			$id_empleadoBanco=$row['banco_id_empleado'];
		}

		$tables="cuenta_clientes";
		$campos="*";
		$sWhere=" cuenta_clientes.nombre LIKE '%".$query."%' and cuenta_clientes.banco_id='$id_empleadoBanco' and cuenta_clientes.estado=1 ";
		$sWhere.=" order by cuenta_clientes.nombre";
		
		
		include 'pagination.php'; //include archivos de paginacion
		//paginacion variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = intval($_REQUEST['per_page']); //¿Cuántos discos quieres mostrar?
		$adjacents  = 4; //Brecha entre páginas después del número de adyacentes.
		$offset = ($page - 1) * $per_page;
		//Cuenta el número total de filas en tu tabla*/
		$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM $tables where $sWhere ");
		if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
		else {echo mysqli_error($con);}
		$total_pages = ceil($numrows/$per_page);
		//consulta principal para recuperar los datos
		$query = mysqli_query($con,"SELECT $campos FROM  $tables where $sWhere LIMIT $offset,$per_page");
		//recorrer los datos obtenidos
		


			
		
		if ($numrows>0){
			
		?>
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<thead>
						<tr>					
							<th>Nombre</th>
							<th>Apellido </th>
							<th>DPI </th>
							<th >NIT</th>
							<th >Teléfeno</th>
							<th >Direccion</th>						
							<th >Hora registrado</th>
							<th >Fecha registrado</th>						
							<th></th>
						</tr>
					</thead>
					<tbody>	
							<?php 
							$finales=0;
							while($row = mysqli_fetch_array($query)){
								$id_cliente=$row['id_clientes'];	
								$chequera_id=$row['id_chequeras'];
								$nombre=$row['nombre'];
								$apellido=$row['apellido'];
								$dpi=$row['dpi'];
								$nit=$row['nit'];
								$telefono=$row['telefono'];	
								$direccion=$row['direccion'];		
								$usuario_cliente= $row['usuario_cliente'];
								$contrasenia_cliente= $row['contrasenia_cliente'];
								$horaApertura=$row['hora_apertura'];
								$fechaApertura=$row['fecha_apertura'];							
									
								$finales++;
							?>	
							<tr class="<?php echo $text_class;?>">						
								<td><?php echo $nombre;?></td>
								<td ><?php echo $apellido;?></td>
								<td ><?php echo $dpi;?></td>
								<td ><?php echo $nit;?></td>
								<td ><?php echo $telefono;?></td>
								<td ><?php echo $direccion;?></td>													
								<td ><?php echo $horaApertura;?></td>
								<td ><?php echo $fechaApertura;?></td>						

								<td>
									<a href="#"  data-target="#editCuentaModal" class="edit" data-toggle="modal"  data-nombre="<?php echo $nombre?>" data-apellido="<?php echo $apellido?>" data-dpi="<?php echo $dpi?>" data-nit="<?php echo $nit;?>"   data-telefono="<?php echo $telefono;?>" data-direccion="<?php echo $direccion;?>" data-usuario_cliente="<?php echo $usuario_cliente;?>" data-contrasenia_cliente="<?php echo $contrasenia_cliente;?>" data-horaA="<?php echo $horaApertura;?>" data-fechaA="<?php echo $fechaApertura;?>"   data-id_cliente="<?php echo $id_cliente; ?>"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
									<a href="#deleteProductModal" class="delete" data-toggle="modal" data-id="<?php echo $chequera_id;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
								</td>
							</tr>
							<?php }?>
							<tr>
								<td colspan='9'> 
									<?php 
										$inicios=$offset+1;
										$finales+=$inicios -1;
										echo "Mostrando $inicios al $finales de $numrows registros";
										echo paginate( $page, $total_pages, $adjacents);
									?>
								</td>
							</tr>
					</tbody>			
				</table>
			</div>	

		
		
		<?php	
		}	
	}
?>          