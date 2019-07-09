-- create view vista_depositos as
SELECT  clientes.nombre, clientes.apellido,
		chequeras.numero_de_cuenta,
        depositos.monto_depositado, depositos.hora_deDeposito, depositos.fecha_deDeposito,
        tipo_documento.nombre_documento,
        cuenta.banco_id

FROM depositos

inner join chequeras on chequeras.id_chequeras = depositos.chequera_id_deposito 
inner join cuenta on cuenta.id_cuentas = chequeras.cuenta_id_chequera
inner join clientes on clientes.id_clientes = cuenta.cliente_id_cuenta
inner join tipo_documento on tipo_documento.idtipo_documento = depositos.tipo_documento_deposito 


order by depositos.fecha_deDeposito desc 