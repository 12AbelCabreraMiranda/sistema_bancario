-- alter view vista_cheque_monetaria as
select cuenta.id_cuentas, chequeras.numero_de_cuenta,tipo_cuentas.id_tipo_cuenta, tipo_cuentas.nombre_tipoCuenta, chequeras.saldo_actual, clientes.id_clientes, clientes.nombre,clientes.apellido,
		banco.nombre_banco as nombreBancoCliente,cuenta.banco_id,
        numeros_cheques.idnumeros_cheques as numeroCheque, numeros_cheques.movimiento, numeros_cheques.idnumeros_cheques

from numeros_cheques
inner join chequeras on chequeras.id_chequeras = numeros_cheques.chequera_id_numCheque
inner join cuenta on cuenta.id_cuentas = chequeras.cuenta_id_chequera
inner join clientes on clientes.id_clientes = cuenta.cliente_id_cuenta
inner join banco on banco.id_banco = cuenta.banco_id
inner join tipo_cuentas on tipo_cuentas.id_tipo_cuenta = chequeras.tipo_cuentas

where numeros_cheques.movimiento='no_cobrado'