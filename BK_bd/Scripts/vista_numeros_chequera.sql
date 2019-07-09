-- alter view vista_numeros_chequera as
SELECT numeros_cheques.estado, clientes.nombre, clientes.apellido,
		chequeras.numero_de_cuenta,
        numeros_cheques.nombre_documento, numeros_cheques.idnumeros_cheques,
        banco.nombre_banco

FROM numeros_cheques
inner join chequeras on chequeras.id_chequeras = numeros_cheques.chequera_id_numCheque
inner join cuenta on cuenta.id_cuentas = chequeras.cuenta_id_chequera
inner join clientes on clientes.id_clientes = cuenta.cliente_id_cuenta
inner join banco on banco.id_banco = cuenta.banco_id
where numeros_cheques.estado=1 