-- Script Crear cuentas de clientes
-- create view cuenta_clientes as
-- select chequeras.id_chequeras,
-- alter view cuenta_clientes as
select chequeras.id_chequeras, clientes.id_clientes,
		clientes.nombre,clientes.apellido,clientes.dpi,clientes.nit,clientes.telefono,clientes.direccion,
		chequeras.hora_apertura,chequeras.fecha_apertura, cuenta.banco_id,
        tipo_cuentas.nombre_tipoCuenta,
         chequeras.numero_de_cuenta, chequeras.estado,
         chequeras.saldo_actual,
         cuenta.empleado_id_cuenta

from chequeras 
inner join cuenta on cuenta.id_cuentas = chequeras.cuenta_id_chequera
inner join clientes on clientes.id_clientes = cuenta.cliente_id_cuenta
inner join tipo_cuentas on tipo_cuentas.id_tipo_cuenta= chequeras.tipo_cuentas
