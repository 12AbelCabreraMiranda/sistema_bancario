<?php //USAR ESTE PDF PARA CREAR CHEQUES
require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

//initialize dompdf class
$document = new Dompdf();

//$document->loadHtml($page);
$connect = mysqli_connect("localhost", "root", "", "sistema_bancario");


//$delete= $_REQUEST['delete'];	
$query = "SELECT nombre, apellido, numero_de_cuenta,idnumeros_cheques FROM vista_numeros_chequera where idnumeros_cheques=1 ";
$result = mysqli_query($connect, $query);
if($row = $result->fetch_assoc()){      
	$nombre =$row['nombre'];		
	$apellido =$row['apellido'];		
	$num_cuenta =$row['numero_de_cuenta'];		
	$num_cheque =$row['idnumeros_cheques'];		

	}

$output = "
<style>
   
</style>
		
	<div>  			
		<p>nombre: ".$row['nombre']."  </p>		
		
	</div>
";


//echo $output;
$document->loadHtml($output);

//set page size and orientation
$document->setPaper('A7', 'landscape');

//Render the HTML as PDF
$document->render();

//Get output of generated pdf in Browser
$document->stream("Webslesson", array("Attachment"=>0));
//1  = Download
//0 = Preview


?>