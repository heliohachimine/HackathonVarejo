<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once "Conexao.php";
        $sql = mysqli_query($con, "SELECT * FROM produtos WHERE id = '$_GET[id]'");
        $row = mysqli_fetch_array($sql);
        $id = $row["id"];
        $nome = $row["nome"];
        $valor = $row["valor_compra"];
        $valorVenda = $row["valor_venda"];
        $tamanho = $row["tamanho"];
        $categoria = $row["categoria"];
        ?>
        <form method="post">
            <p align="left">  Nome:<br></p>
            <input type="text" name="nome" placeholder="Nome" value="<?= $nome?>"/>
            <p align="left">  Valor De Compra:<br></p>
            <input type="text" name="valor" placeholder="Valor" value="<?= $valor?>"/>
            <p align="left">  Valor De Venda:<br></p>
            <input type="text" name="valorVenda" placeholder="Valor" value="<?= $valorVenda?>"/>
            <p align="left">  Tamanho:<br></p>
            <input type="text" name="tamanho" placeholder="Tamanho" value="<?= $tamanho?>">
            <p align="left">  Categoria:<br></p>
            <input type="text" name="categoria" placeholder="Categoria" value="<?= $categoria?>">
            <br>
            <br>
            <button name="salvar"><font color="black">Salvar</font></button>
        </form>
         <?php
        if (isset($_POST["salvar"])) {
            
            $sql = mysqli_query($con, "UPDATE produtos SET nome='$_POST[nome]', valor_compra='$_POST[valor]',"
                            . "tamanho='$_POST[tamanho]', categoria='$_POST[categoria]' , valor_venda='$_POST[valorVenda]' WHERE id = '$_GET[id]'");
        
                    header("Location: Produtos.php");
        }
        ?>
    </body>
</html>
