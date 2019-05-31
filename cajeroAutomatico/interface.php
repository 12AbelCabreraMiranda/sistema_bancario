<!-- NO ESTÁ EN USO-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style/index_style.css">
    
</head>
<style>
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);

        body {
        background: #B1A7A0;
            color: #FCF9F4;
        font-family: "Open Sans", "Arial";
        }
        main {
        max-width: 1200px;
        margin: 30px auto;
            background: #3F3F3D;
            
            box-shadow: 0 3px 5px rgba(0,0,0,0.2);
        }
        input[name=css-tabs] {
        display: none;
        }
        a {
            color: #F29A77;
        }
        #tabs {
            padding: 0 0 0 50px;
            width: calc(100% + 50px);
            margin-left: -50px;
            background: #2B2A28;
            height: 80px;
            border-bottom: 5px solid #EB4E01;
            box-shadow: 0 3px 5px rgba(0,0,0,0.2);
        }
        #tabs::before {
            content: "";
            display: block;
            position: absolute;
            z-index: -100;
            width: 100%;
            left: 0;
            margin-top: 16px;
            height: 80px;
            background: #2B2A28;
            border-bottom: 5px solid #EB4E01;
        }
        #tabs::after {
            content: "";
            display: block;
            position: absolute;
            z-index: 0;
            height: 80px;
            width: 102px;
            background: #EB4E01;
            transition: transform 400ms;
        }
        #tabs label {
            position: relative;
            z-index: 100;
            display: block;
            float: left;
        font-size: 11px;
            text-transform: uppercase;
            text-align: center;
            width: 100px;
            height: 100%;
            border-right: 1px dotted #575654;
            cursor: pointer;
        }
        #tabs label:first-child {
            border-left: 1px dotted #575654;
        }
        #tabs label::before {
            content: "";
            display: block;
            height: 30px;
            width: 30px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
            filter: invert(40%);
            margin: 10px auto;
        }
        #tab1::before {
            background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/106891/paper-plane.png);
        }
        #tab2::before {
            background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/106891/big-cloud.png);
        }
        #tab3::before {
            background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/106891/folding-brochure.png);
        }
        #tab4::before {
            background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/106891/mans-silhouette.png);
        }
        #radio1:checked ~ #tabs #tab1::before, #radio2:checked ~ #tabs #tab2::before, #radio3:checked ~ #tabs #tab3::before, #radio4:checked ~ #tabs #tab4::before {
            filter: invert(100%);
        }
        #radio1:checked ~ #tabs::after {
            transform: translateX(0);
        }
        #radio2:checked ~ #tabs::after {
            transform: translateX(101px);
        }
        #radio3:checked ~ #tabs::after {
            transform: translateX(202px);
        }
        #radio4:checked ~ #tabs::after {
            transform: translateX(303px);
        }
        #content {
            position: relative;
            height: 500px;
        }
        #content::before {
            content: "";
            display: block;
            position: absolute;
            width: 0;
            height: 0;
            margin-left: -50px;
            border-top: 8px solid #000;
            border-right: 10px solid #000;
            border-left: 10px solid transparent;
            border-bottom: 8px solid transparent;
        }
        #content::after {
            content: "";
            display: block;
            position: absolute;
            width: 0;
            height: 0;
            margin-left: calc(100% + 30px);
            border-top: 8px solid #000;
            border-left: 10px solid #000;
            border-right: 10px solid transparent;
            border-bottom: 8px solid transparent;
        }
        #content section {
            position: absolute;
            transform: translateY(50px);
            opacity: 0;
            transition: transform 500ms, opacity 500ms;
        }
        #radio1:checked ~ #content #content1, #radio2:checked ~ #content #content2, #radio3:checked ~ #content #content3, #radio4:checked ~ #content #content4 {
            transform: translateY(0);
            opacity: 1;
        }
       
</style>
<body style="color:white">
    
    <main>
        <h1 style="text-align:center; " >CAJERO AUTOMÁTICO</h1>
        <input id="radio1" type="radio" name="css-tabs" checked>
        <input id="radio2" type="radio" name="css-tabs">
        <input id="radio3" type="radio" name="css-tabs">
        <input id="radio4" type="radio" name="css-tabs">
        <div id="tabs">
            <label id="tab1" for="radio1">INICIO</label>
            <label id="tab2" for="radio2">SERVICIOS</label>
            <label id="tab3" for="radio3">Locations</label>
            <label id="tab4" for="radio4">PERFIL</label>
        </div>
        <div id="content">
            <section id="content1">
                <h3>información</h3>
               
                
            </section>

            <section id="content2">
                <h3>SERVICIOS DISPONIBLES</h3>
               
                <?php include("opciones.php");?>
                
            </section>

            <section id="content3">
                <h3>Interesting Heading Text</h3>
              
            <section id="content4">
            
                <h3>Here Are Many Words</h3>
               
                
            </section>
        </div>
       
    </main>
</body>
</html>