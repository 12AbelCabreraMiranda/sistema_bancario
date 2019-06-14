<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../../img/icono.png">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>
<style>
    a{
        font-family: 'Roboto', sans-serif;
    }
    .tab{
    margin-top: 30px;
    }
    .tab .nav-tabs{
        border:none;
        border-bottom: 1px solid #e4e4e4;
    }
    .nav-tabs li .etiqueta_a{
        padding: 15px 215px;/*ancho de los titulos*/
        border:1px solid #ededed;
        border-top: 2px solid #ededed;
        border-right: 0px none;
        background: #7a81f4;
        color:#fff;
        border-radius: 0px;
        margin-right: 0px;
        font-weight: bold;
        transition: all 0.3s ease-in 0s;
    }
    .nav-tabs li .etiqueta_a:hover{
        border-bottom-color: #ededed;
        border-right: 0px none;
        background: #00b0ad;
        color: #fff;
    }
    .nav-tabs li .etiqueta_a i{
        display: inline-block;
        text-align: center;
        margin-right:10px;
    }
    .nav-tabs li:last-child{
        border-right:1px solid #ededed;
    }
    .nav-tabs li.active .etiqueta_a,
    .nav-tabs li.active .etiqueta_a:focus,
    .nav-tabs li.active .etiqueta_a:hover{
        border-top: 3px solid #00b0ad;
        border-right: 1px solid #d3d3d3;
        margin-top: -15px;
        color: #444;
        padding: 22px 40px;
    }
    .tab .tab-content{
        padding: 20px;
        line-height: 22px;
        box-shadow:0px 1px 0px #808080;
    }
    .tab .tab-content h3{
        margin-top: 0;
    }
    @media only screen and (max-width: 767px){
    .nav-tabs li{
        width:100%;
        margin-bottom: 10px;
    }
    .nav-tabs li a{
        padding: 15px;
    }
    .nav-tabs li.active a,
    .nav-tabs li.active a:focus,
    .nav-tabs li.active a:hover{
        padding: 15px;
        margin-top: 0;
    }
}
 
</style>
<body>
    <?php     
        session_start();    
        if(isset($_SESSION['user'])){
        }else{
            header("location:../../inicio.php");
        }
    ?>

    <header style="background:rgb(10, 97, 148); display: flex;">
        <h4>            
            <span class="glyphicon glyphicon-arrow-left" style="margin-left:20px" aria-hidden="true">
            <a href="../index.php" style="color:white; ">Regresar</a> 
            </span>
        </h4>
    </header>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- TITULO--> <br>
            <h2 class="text-center text-info">TRANSACCIONES DE CLIENTES</h2><br>
            <div class="tab" role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a class="etiqueta_a" href="#Section1" aria-controls="home" role="tab" data-toggle="tab">DEPÓSITOS REALIZADOS DE LOS CLIENTES</a></li>
                    <li role="presentation"><a class="etiqueta_a" href="#Section2" aria-controls="profile" role="tab" data-toggle="tab">RETIROS REALIZADOS DE LOS CLIENTES </a></li>                                      
                </ul>
                
                <!-- Tab panes -->
                <div class="tab-content tabs">
                    <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                        <h3>DEPÓSITOS</h3>                        
                        <?php include("buscar.php");?>
                        
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="Section2">
                        <h3>RETIROS</h3>
                        <?php include("buscar_retir.php");?>   
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    
</body>
</html>