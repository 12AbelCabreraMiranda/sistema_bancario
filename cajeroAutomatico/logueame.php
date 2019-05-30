<?php

session_start();
include('queryBD/seguridad.php');
$connect = mysqli_connect("localhost","root","","sistema_bancario");

if(isset($_POST["user"]) && isset($_POST["pass"])){
  $user = mysqli_real_escape_string($connect, $_POST["user"]);
  $pass = mysqli_real_escape_string($connect, $_POST["pass"]);
  
  //ENCRIPTACIÓN DE PASSWORD
  $passEncriptado = SED::encryption($pass);

  $sql = "SELECT tipo_tarjeta, codigo_tarjeta FROM vista_tarjeta_debito WHERE codigo_tarjeta='$user' AND pin_tarjeta='$passEncriptado' and estado='Habilitado'  ";
  $result = mysqli_query($connect, $sql);
  $num_row = mysqli_num_rows($result);
  
  if ($num_row == "1") {
    $data = mysqli_fetch_array($result);
    $_SESSION["user"] = $data["codigo_tarjeta"];
    echo $data["tipo_tarjeta"];
  } else {
    echo "error";
  }
} else {
  echo "error";
}

?>
