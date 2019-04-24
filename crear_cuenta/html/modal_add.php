<div id="addProductModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="add_product" id="add_product">
					<div class="modal-header">						
						<h4 class="modal-title">Agregar datos de la nueva cuenta</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="form-group col-md-6">
								<label>Cedula</label>
								<input type="text" name="cedula" id="cedula"class="form-control" required>
							</div>
							<div class="form-group col-md-6">            
								<label>Nombre</label>
								<input type="text" name="nombre" id="nombre" class="form-control" required>
							</div>	
							<div class="form-group col-md-6">
								<label>Código</label>
								<input type="text" name="code"  id="code" class="form-control" required>							
							</div>
							<div class="form-group col-md-6">
								<label>Producto</label>
								<input type="text" name="name" id="name" class="form-control" required>
							</div>
							<div class="form-group col-md-6">
								<label>Categoría</label>
								<input type="text" name="category" id="category" class="form-control" required>
							</div>
							<div class="form-group col-md-6">
								<label>Stock</label>
								<input type="number" name="stock" id="stock" class="form-control" required>
							</div>
							<div class="form-group col-md-6">
								<label>Precio</label>
								<input type="text" name="price" id="price" class="form-control" required>
							</div>	
							<div class="form-group col-md-6">
								<label>Precio</label>
								<input type="text" name="price" id="price" class="form-control" required>
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