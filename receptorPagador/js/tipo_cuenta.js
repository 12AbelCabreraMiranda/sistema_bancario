function ahorro(){
    $('.ahorro').show();
    $('.monetario').hide();
    $('#btnMonetario').attr("disabled", true);//boton desabilitado
    $('#campoNumBoleta').show(); 

    $(".idtipo_documento").html("<input type='text' name='tipoDoc' class='idtipo_documento' value='1'>");
}

function monetario(){
    $('.ahorro').hide();
    $('.monetario').show();
    $('#btnAhorro').attr("disabled", true);//boton desabilitado
    $('#campoNumBoleta').hide();
    $('#numBoleta').attr("disabled", true);//campo desabilitado

    $(".idtipo_documento").html("<input type='text' name='tipoDoc' class='idtipo_documento' value='2'>");
}