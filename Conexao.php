<?php
    $dbname="base";
    $usuario="root";
    $password="";
    //conecta o servidor sql
    $con = mysqli_connect("127.0.0.1","$usuario","$password","$dbname");

// Checa conexão
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


?>

