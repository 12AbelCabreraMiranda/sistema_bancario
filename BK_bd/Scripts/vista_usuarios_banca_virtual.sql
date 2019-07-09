-- create view vista_usuarios_banca_virtual as
-- alter view vista_usuarios_banca_virtual as
SELECT usuario_banca_virtual.usuario_cliente, usuario_banca_virtual.contrasenia_cliente, 
		clientes.nombre,clientes.apellido,
        chequeras.numero_de_cuenta,
		usuario_banca_virtual.hora_solicitado,fecha_solicitado,
        tipo_cuentas.nombre_tipoCuenta

FROM usuario_banca_virtual

inner join chequeras on chequeras.id_chequeras =  usuario_banca_virtual.chequera_id_virtual
inner join clientes on clientes.id_clientes = usuario_banca_virtual.cliente_id_virtual
inner join tipo_cuentas on tipo_cuentas.id_tipo_cuenta =chequeras.tipo_cuentas