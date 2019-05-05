<?php

session_start();
$connect = mysqli_connect("localhost","root","","sistema_bancario");

if(isset($_POST["user"]) && isset($_POST["pass"])){
  $user = mysqli_real_escape_string($connect, $_POST["user"]);
  $pass = mysqli_real_escape_string($connect, $_POST["pass"]);
  
  $passEncriptado=sha1($pass);
  $sql = "SELECT tipoUsuario_id, usuario FROM empleado WHERE usuario='$user' AND contrasenia='$passEncriptado'";
  $result = mysqli_query($connect, $sql);
  $num_row = mysqli_num_rows($result);
  
  if ($num_row == "1") {
    $data = mysqli_fetch_array($result);
    $_SESSION["user"] = $data["usuario"];
    echo $data["tipoUsuario_id"];
  } else {
    echo "error";
  }
} else {
  echo "error";
}

?>
