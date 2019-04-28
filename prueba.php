
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Document</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
      <div>
        <input class="text1" id="" cols="30" rows="10">
        <span class="count1"></span>
      </div>

      <div>
        <textarea class="text2" id="" cols="30" rows="10"></textarea>
        <span class="count2"></span>
      </div>

    <script>
      $(function(){
        function limitarCaracteres(textarea, counter, limit){
            $('.'+counter).text(limit+' restantes');
            var left;
            $('.'+textarea).on('keyup', function(e){
                var qtdCaracteres = $(this).val().length;
                left = limit-qtdCaracteres;
                if(left <=0){
                    left =0;
                    var textoActual = $(this).val();
                    var novoTexto = '';
                    for(var n = 0; n<limit;n++){
                        novoTexto +=textoActual[n];
                    }
                    $(this).val(novoTexto);
                }
                $('.'+counter).text(left+' restantes');
            });
        }
        limitarCaracteres('text1', 'count1',150);
        limitarCaracteres('text2', 'count2',300);
    })
    </script>
    </body>
    </html>