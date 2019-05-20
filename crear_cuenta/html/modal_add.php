<?php
    $conexion = new mysqli("localhost","root","","sistema_bancario");

    $query = "select id_tipo_cuenta, nombre_tipoCuenta from tipo_cuentas";
    $resultado = $conexion->query($query);

?>
<div id="addCuentaModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="add_cuenta" id="add_cuenta">
					<div class="modal-header">
						<center>
							<h4 class="modal-title">Datos del cliente</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</center>						
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="form-group col-md-6">
								<label>Nombre</label>
								<input type="text" name="name" id="name"class="form-control" required>
							</div>
							<div class="form-group col-md-6">            
								<label>Apellido</label>
								<input type="text" name="apellido" id="apellido" class="form-control" required>
							</div>	
							<div class="form-group col-md-6">
								<label>DPI</label>
								<input type="text" name="dpi"  id="dpi" class="form-control text1" required onkeypress="return soloNumero(event)" onpaste="return false">	
								<span class="count1"></span>						
							</div>
							<div class="form-group col-md-6">
								<label>Nit</label>
								<input type="text" name="nit" id="nit" class="form-control text2" required onkeypress="return soloNumero(event)" onpaste="return false">
								<span class="count2"></span>
							</div>
							<div class="form-group col-md-6">
								<label>Teléfono</label>
								<input type="text" name="telefono" id="telefono" class="form-control" required>
							</div>
							<div class="form-group col-md-6">
								<label>Dirección</label>
								<input type="text" name="direccion" id="direccion" class="form-control" required>
							</div>	
							
							
						</div>
						<div class="row" style="background:#e6edea">
							<center>
								<h4 class="modal-title">Datos para aperturar cuenta</h4><hr>							
							</center>					
																										
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
							<div class="form-group col-md-6">
								<label>Heredar cuenta a:</label>
								<input type="text" name="heredarCuenta" id="heredarCuenta" class="form-control" required placeholder="Ingresar nombre" >
							</div>
							
						</div>

					</div>
					<div class="modal-footer">
						<center>							
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
							<input type="submit" class="btn btn-success" value="Guardar datos">
						</center>
					</div>
				</form>
			</div>
		</div>
	</div>