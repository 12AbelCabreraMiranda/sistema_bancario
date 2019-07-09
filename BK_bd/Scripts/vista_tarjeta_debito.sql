-- SELECT * FROM sistema_bancario.tarjeta_debito;
-- create alter view vista_tarjeta_debito as
SELECT tarjeta_debito.codigo_tarjeta, tarjeta_debito.pin_tarjeta, tarjeta_debito.tipo_tarjeta,
		clientes.nombre,clientes.apellido,
        chequeras.numero_de_cuenta,chequeras.saldo_actual,
		tarjeta_debito.hora_solicitado,fecha_solicitado,
        tipo_cuentas.nombre_tipoCuenta,
        tarjeta_debito.estado

FROM tarjeta_debito

inner join chequeras on chequeras.id_chequeras =  tarjeta_debito.chequera_id_tdebito
inner join clientes on clientes.id_clientes = tarjeta_debito.cliente_id_tdebito
inner join tipo_cuentas on tipo_cuentas.id_tipo_cuenta =chequeras.tipo_cuentas

