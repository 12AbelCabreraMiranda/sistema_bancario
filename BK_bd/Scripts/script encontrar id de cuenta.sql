-- create view idcuenta as
select  cuenta.id_cuentas, clientes.dpi

from cuenta
inner join clientes on clientes.id_clientes = cuenta.cliente_id_cuenta

-- where clientes.dpi=435235232

-- SELECT * FROM sistema_bancario.cuenta;