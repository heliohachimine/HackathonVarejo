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
        $sql = mysqli_query($con, "SELECT * FROM clientes WHERE id = '$_GET[id]'");
        $row = mysqli_fetch_array($sql);
        $id = $row["id"];
                    $nome = $row["nome"];
                    $endereco = $row["endereco"];
                    $cpf = $row["cpf"];
                    $tel = $row["tel"];
                    $cel = $row["cel"];
                    $face = $row["face"];
                    $insta = $row["insta"];
        ?>
        <form method="post">
            <p align="left">  Nome:<br></p>
            <input type="text" name="nome" placeholder="Nome" value="<?= $nome?>"/>
            <p align="left">  Endereço:<br></p>
            <input type="text" name="endereco" placeholder="Endereço" value="<?= $endereco?>">
            <p align="left">  CPF:<br></p>
            <input type="text" name="cpf" placeholder="CPF" value="<?= $cpf?>">
            <p align="left">  Telefone:<br></p>
            <input type="text" name="tel" placeholder="Telefone" value="<?= $tel?>">
            <p align="left">  Celular:<br></p>
            <input type="text" name="cel" placeholder="Celular" value="<?= $cel?>">
            <p align="left">  Facebook:<br></p>
            <input type="text" name="face" placeholder="Facebook" value="<?= $face?>">
            <p align="left">  Instagram:<br></p>
            <input type="text" name="insta" placeholder="Instagram" value="<?= $insta?>">
            <br>
            <br>
            <button name="salvar"><font color="black">Salvar</font></button>
        </form>
         <?php
        if (isset($_POST["salvar"])) {
            $sql = mysqli_query($con, "UPDATE clientes SET nome='$_POST[nome]',endereco='$_POST[endereco]'"
                            . ", cpf='$_POST[cpf]' , tel='$_POST[tel]'"
                            . ", cel='$_POST[cel]', face='$_POST[face]'"
                            . ", insta='$_POST[insta]' WHERE id = '$_GET[id]'");
             header("Location: clientes.php");
        }
        ?>
    </body>
</html>
