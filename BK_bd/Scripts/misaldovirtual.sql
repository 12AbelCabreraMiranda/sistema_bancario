-- alter view misaldovirtual as

SELECT 
		clientes.nombre, clientes.apellido, 
        usuario_banca_virtual.usuario_cliente, usuario_banca_virtual.contrasenia_cliente,
        chequeras.numero_de_cuenta,
        chequeras.saldo_actual


FROM usuario_banca_virtual
inner join chequeras on chequeras.id_chequeras = usuario_banca_virtual.chequera_id_virtual
inner join clientes on clientes.id_clientes = usuario_banca_virtual.cliente_id_virtual
