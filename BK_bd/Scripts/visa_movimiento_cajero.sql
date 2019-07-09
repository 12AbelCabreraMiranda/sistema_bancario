-- create view visa_movimiento_cajero as
select tarjeta_debito.codigo_tarjeta,
cajero_automatico.monto_retirar as Monto_Retirado, cajero_automatico.hora_cajero as Hora_Retirado, cajero_automatico.fecha_cajero as Fecha_retirado


from cajero_automatico

inner join tarjeta_debito on tarjeta_debito.idtarjeta_debito = cajero_automatico.tarjetaDebito_id_cajero




