function retiro(){
    $('#retiroSaldo').show();
    $('#opcionMenu').hide();
    
}
function cancelarRetiro(){
    $('#retiroSaldo').hide();
    $('#opcionMenu').show();
}

function movimientos(){
    $('#movimiento').show();
    $('#opcionMenu').hide();
}

function boton_movimiento(){       
    setTimeout("location.href='../pageCliente.php'", 0);//refress page
}
