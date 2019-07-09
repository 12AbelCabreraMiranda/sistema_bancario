-- create view - alter view cuenta_cliente_logueado as
select chequeras.numero_de_cuenta,clientes.nombre, clientes.apellido,
		usuario_banca_virtual.usuario_cliente, usuario_banca_virtual.contrasenia_cliente,           
        chequeras.saldo_actual
		
from usuario_banca_virtual 
inner join chequeras on chequeras.id_chequeras = usuario_banca_virtual.chequera_id_virtual
inner join cuenta on cuenta.id_cuentas = chequeras.cuenta_id_chequera
inner join clientes on clientes.id_clientes = cuenta.cliente_id_cuenta
