<?php
    $conexion = new mysqli("localhost","root","","sistema_bancario");

    $query = "select id_tipo_cuenta, nombre_tipoCuenta from tipo_cuentas";
    $resultado = $conexion->query($query);

?>

<div id="masCuentaModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="view_cuenta" id="view_cuenta">
					<div class="modal-header" style="background: #53a06d; text-align:center">						
						<h4 class="modal-title" style="color:white">CREAR OTRA CUENTA</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>

					<div class="modal-body">
						<div class="row">
							<div class="form-group col-md-6">
								<label>Nombre</label>
								<input disabled type="text" name="view_nombre"  id="view_nombre" class="form-control" required>
								<input type="show" name="view_id" id="view_id" >
							</div>
							<div class="form-group col-md-6">
								<label>Apellido</label>
								<input disabled type="text" name="view_apellido" id="view_apellido" class="form-control" required>
							</div>
							<div class="form-group col-md-6">
								<label>DPI</label>
								<input disabled type="text" name="view_dpi" id="view_dpi" class="form-control" required>
							</div>
							<div class="form-group col-md-6">
								<label>NIT</label>
								<input disabled type="text" name="view_nit" id="view_nit" class="form-control" required>
							</div>
							<div class="form-group col-md-6">
								<label>Telefono</label>
								<input disabled type="text" name="view_telefono" id="view_telefono" class="form-control" required>
							</div>	
							
							
							<div class="form-group col-md-6">
								<label>Dirección</label>
								<input disabled type="text" name="view_direccion" id="view_direccion" class="form-control" required>
							</div>
							<div class="form-group col-md-6"> 
								<label>TIPO DE CUENTA </label>								
								<select name="tipo_cuenta" class="form-control"  id="tipo_cuenta">
									<?php while($row = $resultado->fetch_assoc()){  ?>
										<option value="<?php echo $row['id_tipo_cuenta']; ?> ">
											<?php  echo $row['nombre_tipoCuenta']; ?>                                             
										</option>
									<?php }?>
								</select> 								
                            </div>
                            <div class="form-group col-md-6">
								<label>Aperturar cuenta con Q.100.00</label>
								<input type="text" name="saldoInicial" id="saldoInicial" class="form-control" required value="100" >
							</div>
							
							
													
						</div>					

					</div>
					<div class="modal-footer">
						<center>
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
							<input type="submit" class="btn btn-info" value="Guardar datos">
						</center>
					</div>
				</form>
			</div>
		</div>
	</div>