
//FUNCION PARA LIMITAR CARACTERES
$(function(){
    function limitarCaracteres(textarea, counter, limit){
        $('.'+counter).text(limit+' Caracter Restantes');
        var left;
        $('.'+textarea).on('keyup', function(e){
            var qtdCaracteres = $(this).val().length;
            left = limit-qtdCaracteres;
            if(left <=0){
                left =0;
                var textoActual = $(this).val();
                var nuevoTexto = '';
                for(var n = 0; n<limit;n++){
                    nuevoTexto +=textoActual[n];
                }
                $(this).val(nuevoTexto);
            }
            $('.'+counter).text(left+' Caracter Restantes');
        });
    }
    limitarCaracteres('text1', 'count1',13);
    limitarCaracteres('text2', 'count2',9);    
})

function soloNumero(e){

    key=e.keyCode || e.which;
    teclado= String.fromCharCode(key);
    numero="0123456789";
    especiales="8-37-38-46";

    teclado_especial = false;

    for(var i in especiales){
        if(key==especiales[i]){
            teclado_especial=true;
        }
    }

    if(numero.indexOf(teclado)==-1 && !teclado_especial){
        return false;
    }
}