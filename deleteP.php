<?php

include_once "Conexao.php";
$sql = mysqli_query($con, "DELETE FROM produtos WHERE id = '$_GET[id]'");
header("Location: Produtos.php");
?>

