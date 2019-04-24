$(function() {
    load(1);
});
function load(page){
    var query=$("#q").val();
    var per_page=10;
    var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
    $("#loader").fadeIn('slow');
    $.ajax({
        url:'ajax/listar_productos.php',
        data: parametros,
         beforeSend: function(objeto){
        $("#loader").html("Cargando...");
      },
        success:function(data){
            $(".outer_div").html(data).fadeIn('slow');
            $("#loader").html("");
        }
    })
}

//SCRIPT DE VISTA DE VENTANA DE EDICION
$('#editProductModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Botón que activó el modal.

  var nombreCleinte = button.data('nombre') 
  $('#edit_nombre').val(nombreCleinte)
  var apellidoCliente = button.data('apellido') 
  $('#edit_apellido').val(apellidoCliente)
  var dpiCliente = button.data('dpi') 
  $('#edit_dpi').val(dpiCliente)
  var nitCliente = button.data('nit') 
  $('#edit_nit').val(nitCliente)
  var telefonoCliente = button.data('telefono') 
  $('#edit_telefono').val(telefonoCliente)
  var direccionCliente = button.data('direccion') 
  $('#edit_direccion').val(direccionCliente)
  var usuCliente = button.data('usuario_cliente') 
  $('#edit_UsuarioCliente').val(usuCliente)
  var passwCliente = button.data('contrasenia_cliente') 
  $('#edit_passwordCliente').val(passwCliente)

  var id = button.data('chequera_id') 
  $('#edit_id').val(id)
})



$('#deleteProductModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Botón que activó el modal.
  var id = button.data('id') 
  $('#delete_id').val(id)
})

// SCRIPT DE EDICION CON BASE DE DATOS
$( "#edit_product" ).submit(function( event ) {
  
  var parametros = $(this).serialize();

    $.ajax({
            type: "POST",
            url: "ajax/editar_producto.php",
            data: parametros,
             beforeSend: function(objeto){
                $("#resultados").html("Enviando...");
              },
            success: function(datos){
            $("#resultados").html(datos);                          
            load(1);
            $('#editProductModal').modal('hide');
          }
    });
  event.preventDefault();
  
});

//GUARDAR REGISTROS CONEXION CON LA BASE DE DATOS
$( "#add_product" ).submit(function( event ) {
  var parametros = $(this).serialize();
    $.ajax({
            type: "POST",
            url: "ajax/guardar_producto.php",
            data: parametros,
             beforeSend: function(objeto){
                $("#resultados").html("Enviando...");
              },
            success: function(datos){
            $("#resultados").html(datos);
            load(1);
            $('#addProductModal').modal('hide');
          }
    });
  event.preventDefault();
});

//SCRIPT PARA BORRAR REGISTROS DE LA BASE DE DATOS
$( "#delete_product" ).submit(function( event ) {
  var parametros = $(this).serialize();
    $.ajax({
            type: "POST",
            url: "ajax/eliminar_producto.php",
            data: parametros,
             beforeSend: function(objeto){
                $("#resultados").html("Enviando...");
              },
            success: function(datos){
            $("#resultados").html(datos);
            load(1);
            $('#deleteProductModal').modal('hide');
          }
    });
  event.preventDefault();
});