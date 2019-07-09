-- SELECT * FROM sistema_bancario.retiros;
SELECT  clientes.nombre, clientes.apellido,
		chequeras.numero_de_cuenta,
        retiros.monto_retirado, retiros.hora_deRetiro, retiros.fecha_deRetiro,
        tipo_documento.nombre_documento,
        cuenta.banco_id

FROM retiros

inner join chequeras on chequeras.id_chequeras = retiros.chequera_id 
inner join cuenta on cuenta.id_cuentas = chequeras.cuenta_id_chequera
inner join clientes on clientes.id_clientes = retiros.cliente_id_retiro
inner join tipo_documento on tipo_documento.idtipo_documento = retiros.tipo_documento_retiro 

order by retiros.fecha_deRetiro desc 