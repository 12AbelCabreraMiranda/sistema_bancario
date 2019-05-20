<div id="vistaCuentaModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="vista_cuenta" id="vista_cuenta" method="post" enctype="multipart/form-data">
					<div class="modal-header">						
						<h4 class="modal-title">Detalle de la cuenta del cliente</h4>						
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>

					<div class="modal-body">
						<div class="row">														
							<div class="form-group col-md-6">
								<label>Numero de cuenta</label>
								<input type="text" name="vista_NumCuenta" id="vista_NumCuenta" class="form-control"disabled required>
								<input type="hidden" name="vista_NumCuentaCliente" id="vista_NumCuentaCliente">
								                                   
							</div>
							<div class="form-group col-md-6">
								<label>Tipo de cuenta</label>
								<input type="text" name="vista_tipCuenta" id="vista_tipCuenta" class="form-control"disabled required>
							</div>
							<div class="form-group col-md-6">
								<label>Saldo actual</label>
								<input type="text" name="vista_saldoActual" id="vista_saldoActual" class="form-control"disabled required>
							</div>		

						</div>		
						<div id="respuestaSolicitudUsuarioVirtual">usuaRes</div>			

					</div>
					<div class="modal-footer">
						<center>
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cerrar">	
							<input type="submit" class="btn btn-success" value="Generar usuario" onclick="registrarSolicitudVirtual()" >						
						</center>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script src="codigoBancaVirtual/crearCodigo.js"></script>