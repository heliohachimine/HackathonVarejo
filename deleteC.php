<?php

include_once "Conexao.php";
$sql = mysqli_query($con, "DELETE FROM clientes WHERE id = '$_GET[id]'");
header("Location: clientes.php");
?>

