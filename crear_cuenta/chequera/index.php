<?php //USAR ESTE PDF PARA CREAR CHEQUES
require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

//initialize dompdf class
$document = new Dompdf();

//$document->loadHtml($page);
$connect = mysqli_connect("localhost", "root", "", "sistema_bancario");
$delete= $_REQUEST['delete'];	



//CONSULTA DEL CLIENTE
$query = "SELECT nombre, apellido, numero_de_cuenta,idnumeros_cheques,nombre_banco FROM vista_numeros_chequera where idnumeros_cheques='$delete' ";
$result = mysqli_query($connect, $query);
if($row = $result->fetch_assoc()){      
	$nombre =$row['nombre'];		
	$apellido =$row['apellido'];		
	$num_cuenta =$row['numero_de_cuenta'];		
	$num_cheque =$row['idnumeros_cheques'];		
	$banco =$row['nombre_banco'];	
	}
//UPDATE TABLE TIEMPO DE JUEGO
$query5="UPDATE numeros_cheques SET estado=0 where idnumeros_cheques='$delete'";
$resultad5= $connect->query($query5);
$output = "
<style>
   
</style>
	<div style='position:absolute; z-index:1;text-transform: uppercase; color: green '><b>BANCO ".$row['nombre_banco']."</b> </div>

	<div style='background:#efeded'>  		
		<center> 
			<p>".$row['nombre']." ".$row['apellido']."  </p> 
			No. Cta. ".$row['numero_de_cuenta']."  			
		</center>
		
		<p style='margin-left:320px'> Cheque No. <b>0000".$row['idnumeros_cheques']."</b></p> 

		<p>Lugar y fecha:_____________________________<b>Q.___________</b> </p>
		<p>Páguese a:_____________________________________________ </p>
		<p>Suma de:________________________________________Quetzales </p>
		<p>Ref:__________   _______________________________________ </p>
		 <p style='margin-left:270px'>Firma</p>
	</div>
";


//echo $output;
$document->loadHtml($output);

//set page size and orientation
$document->setPaper('A6', 'landscape');

//Render the HTML as PDF
$document->render();

//Get output of generated pdf in Browser
$document->stream("miChequePDF", array("Attachment"=>0));
//1  = Download
//0 = Preview


?>