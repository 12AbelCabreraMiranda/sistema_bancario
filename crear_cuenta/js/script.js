$(function() {
    load(1);
});
function load(page){
    var query=$("#q").val();
    var per_page=10;
    var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
    $("#loader").fadeIn('slow');
    $.ajax({
        url:'ajax/listar_cuentas.php',
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
$('#editCuentaModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Botón que activó el modal.

  var nombre = button.data('nombre') 
  $('#edit_nombre').val(nombre)

  var apellido = button.data('apellido') 
  $('#edit_apellido').val(apellido)

  var dpi = button.data('dpi') 
  $('#edit_dpi').val(dpi)

  var nit = button.data('nit') 
  $('#edit_nit').val(nit)

  var telefono = button.data('telefono') 
  $('#edit_telefono').val(telefono)

  var direccion = button.data('direccion') 
  $('#edit_direccion').val(direccion)

  var id = button.data('id_cliente') 
  $('#edit_id').val(id)
})



$('#deleteProductModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Botón que activó el modal.
  var id = button.data('id') 
  $('#delete_id').val(id)
})

// SCRIPT DE EDICION CON BASE DE DATOS
$( "#edit_cuenta" ).submit(function( event ) {
  
  var parametros = $(this).serialize();

    $.ajax({
            type: "POST",
            url: "ajax/editar_cuentas.php",
            data: parametros,
             beforeSend: function(objeto){
                $("#resultados").html("Enviando...");
              },
            success: function(datos){
            $("#resultados").html(datos);                          
            load(1);
            $('#editCuentaModal').modal('hide');
          }
    });
  event.preventDefault();
  
});

//GUARDAR REGISTROS CONEXION CON LA BASE DE DATOS
$( "#add_cuenta" ).submit(function( event ) {
  var parametros = $(this).serialize();
    $.ajax({
            type: "POST",
            url: "ajax/prueba2.php",
            data: parametros,
             beforeSend: function(objeto){
                $("#resultados").html("Enviando...");
              },
            success: function(datos){
            $("#resultados").html(datos);
            load(1);
            $('#addCuentaModal').modal('hide');
          }
    });
  event.preventDefault();
});

//SCRIPT PARA BORRAR REGISTROS DE LA BASE DE DATOS
$( "#delete_product" ).submit(function( event ) {
  var parametros = $(this).serialize();
    $.ajax({
            type: "POST",
            url: "ajax/eliminar_cuentas.php",
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


//SCRIPT DE VISTA DE VENTANA
$('#vistaCuentaModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Botón que activó el modal.

  var nombreCliente = button.data('usuario_cliente') 
  $('#nombreCliente').val(nombreCliente)

  var numeroCuenta = button.data('numero_de_cuenta') 
  $('#vista_NumCuenta').val(numeroCuenta)

  var tipoCuentas = button.data('tipocuenta') 
  $('#vista_tipCuenta').val(tipoCuentas)

  var saldoActual = button.data('saldo_actual') 
  $('#vista_saldoActual').val(saldoActual)



  var id = button.data('id_cliente') 
  $('#vista_id').val(id)
})

//SCRIPT NEWCUENTACLIENTEEXISTENTE

$('#masCuentaModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Botón que activó el modal.

  var nombre = button.data('nombre') 
  $('#view_nombre').val(nombre)

  var apellido = button.data('apellido') 
  $('#view_apellido').val(apellido)

  var dpi = button.data('dpi') 
  $('#view_dpi').val(dpi)

  var nit = button.data('nit') 
  $('#view_nit').val(nit)

  var telefono = button.data('telefono') 
  $('#view_telefono').val(telefono)

  var direccion = button.data('direccion') 
  $('#view_direccion').val(direccion)


  var id = button.data('id_cliente') 
  $('#view_id').val(id)
})

//GUARDAR OTRA NUEVA CUENTA CLIENTE

$( "#view_cuenta" ).submit(function( event ) {
  
  var parametros = $(this).serialize();

    $.ajax({
            type: "POST",
            url: "ajax/cuentaNueva.php",
            data: parametros,
             beforeSend: function(objeto){
                $("#resultados").html("Enviando...");
              },
            success: function(datos){
            $("#resultados").html(datos);                          
            load(1);
            $('#masCuentaModal').modal('hide');
          }
    });
  event.preventDefault();
  
});