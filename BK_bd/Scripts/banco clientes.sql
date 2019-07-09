-- alter view banco_cliente as

select banco.nombre_banco,
		usuario_banca_virtual.usuario_cliente
		

from usuario_banca_virtual 
inner join chequeras on chequeras.id_chequeras = usuario_banca_virtual.chequera_id_virtual
inner join cuenta on cuenta.id_cuentas = chequeras.cuenta_id_chequera
inner join clientes on clientes.id_clientes = cuenta.cliente_id_cuenta
inner join banco on banco.id_banco = cuenta.banco_id
