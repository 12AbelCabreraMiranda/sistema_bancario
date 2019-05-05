<?php

session_start();
include('queryBD/seguridad.php');
$connect = mysqli_connect("localhost","root","","sistema_bancario");

if(isset($_POST["user"]) && isset($_POST["pass"])){
  $user = mysqli_real_escape_string($connect, $_POST["user"]);
  $pass = mysqli_real_escape_string($connect, $_POST["pass"]);
  
  //ENCRIPTACIÓN DE PASSWORD
  $passEncriptado = SED::encryption($pass);

  $sql = "SELECT tipoUsu, usuario_cliente FROM clientes WHERE usuario_cliente='$user' AND contrasenia_cliente='$passEncriptado'";
  $result = mysqli_query($connect, $sql);
  $num_row = mysqli_num_rows($result);
  
  if ($num_row == "1") {
    $data = mysqli_fetch_array($result);
    $_SESSION["user"] = $data["usuario_cliente"];
    echo $data["tipoUsu"];
  } else {
    echo "error";
  }
} else {
  echo "error";
}

?>
