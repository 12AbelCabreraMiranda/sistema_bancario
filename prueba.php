<!-- 
//$conexion = new mysqli("localhost","root","","sistema_bancario");
//include('crear_cuenta/codigoBancaVirtual/seguridad.php');
/*
//FUNCION PARA CREAR CODIGOS QUE SERVIRÁ PARA OTRA CUENTA DEL CLIENTE	
$nombre = 'abel';	
$numero=5;								
$segundo = date ('s', time());
$minuto = date ('i', time());
$anio = date("Y");										
$cuenta_numCuenta = $numero.strlen($nombre).$segundo.$minuto.$anio;
//$cuenta_numCuenta = $id_clienteRegistrado.strlen($cuenta_nombre).$segundo.$minuto.$anio;
echo $cuenta_numCuenta;
*/
//SELECCION USUARIO para extraer id del maestro logeado
/*
$pass;
$query = ("SELECT pin_tarjeta FROM tarjeta_debito where idtarjeta_debito=19");
$resultado = $conexion->query($query);
if($row = $resultado->fetch_assoc()){      
    $pass =$row['pin_tarjeta'];
 }*/
/*
 $passss= 'bXpteDRESFRCUDVVTVB2elI2anZLUT09';
 //DESENCRIPTACIÓN DE PASSWORD
$passDesencriptado = SED::decryption($passss);
echo $passDesencriptado;
-->

<?php
//index.php
//include autoloader

require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace

use Dompdf\Dompdf;

//initialize dompdf class

$document = new Dompdf();

$html = '
 <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<table>
  <tr>
    <th>Company</th>
    <th>Contact</th>
    <th>Country</th>
  </tr>
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Mexico</td>
  </tr>
  <tr>
    <td>Ernst Handel</td>
    <td>Roland Mendel</td>
    <td>Austria</td>
  </tr>
  <tr>
    <td>Island Trading</td>
    <td>Helen Bennett</td>
    <td>UK</td>
  </tr>
  <tr>
    <td>Laughing Bacchus Winecellars</td>
    <td>Yoshi Tannamuri</td>
    <td>Canada</td>
  </tr>
  <tr>
    <td>Magazzini Alimentari Riuniti</td>
    <td>Giovanni Rovelli</td>
    <td>Italy</td>
  </tr>
</table>
';

//$document->loadHtml($html);
$page = file_get_contents("cat.html");

//$document->loadHtml($page);

$connect = mysqli_connect("localhost", "root", "", "testing1");

$query = "
 SELECT category.category_name, product.product_name, product.product_price
 FROM product 
 INNER JOIN category 
 ON category.category_id = product.category_id
";
$result = mysqli_query($connect, $query);

$output = "
 <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<table>
 <tr>
  <th>Category</th>
  <th>Product Name</th>
  <th>Price</th>
 </tr>
";

while($row = mysqli_fetch_array($result))
{
 $output .= '
  <tr>
   <td>'.$row["category_name"].'</td>
   <td>'.$row["product_name"].'</td>
   <td>$'.$row["product_price"].'</td>
  </tr>
 ';
}

$output .= '</table>';

//echo $output;

$document->loadHtml($output);

//set page size and orientation

$document->setPaper('A4', 'landscape');

//Render the HTML as PDF

$document->render();

//Get output of generated pdf in Browser

$document->stream("Webslesson", array("Attachment"=>0));
//1  = Download
//0 = Preview


?>
