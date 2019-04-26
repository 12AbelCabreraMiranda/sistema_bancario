<div id="editCuentaModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="edit_cuenta" id="edit_cuenta">
					<div class="modal-header">						
						<h4 class="modal-title">Editar datos del cliente</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>

					<div class="modal-body">
						<div class="row">
							<div class="form-group col-md-6">
								<label>Nombre</label>
								<input type="text" name="edit_nombre"  id="edit_nombre" class="form-control" required>
								<input type="hidden" name="edit_id" id="edit_id" >
							</div>
							<div class="form-group col-md-6">
								<label>Apellido</label>
								<input type="text" name="edit_apellido" id="edit_apellido" class="form-control" required>
							</div>
							<div class="form-group col-md-6">
								<label>DPI</label>
								<input type="text" name="edit_dpi" id="edit_dpi" class="form-control" required>
							</div>
							<div class="form-group col-md-6">
								<label>NIT</label>
								<input type="text" name="edit_nit" id="edit_nit" class="form-control" required>
							</div>
							<div class="form-group col-md-6">
								<label>Telefono</label>
								<input type="text" name="edit_telefono" id="edit_telefono" class="form-control" required>
							</div>	
							
							
							<div class="form-group col-md-6">
								<label>Dirección</label>
								<input type="text" name="edit_direccion" id="edit_direccion" class="form-control" required>
							</div>
							
							<div class="form-group col-md-6">
								<label>Usuario Cliente</label>
								<input type="text" name="edit_UsuarioCliente" id="edit_UsuarioCliente" class="form-control" required>
							</div>
	
							<div class="form-group col-md-6">
								<label>Contraseña Cliente</label>
								<input type="text" name="edit_passwordCliente" id="edit_passwordCliente" class="form-control" required>
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