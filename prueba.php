
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Document</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
    <input id="inputime1" type="text">

  <script>
      
      $(document).ready(Principal);
    function Principal(){
        var flag1 = true;
        $(document).on('keyup','[id=inputime1]',function(e){
            if($(this).val().length == 2 && flag1) {
                $(this).val($(this).val()+" ");
                flag1 = false;
            }
        });
    }


 
  </script>
    </body>
    </html>