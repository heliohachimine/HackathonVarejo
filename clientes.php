<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <style>
        table, td, th {    
            border: 1px solid #ddd;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 15px;
        }
    </style>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="post">
            <p align="left">  Nome:<br></p>
            <input type="text" name="nome" placeholder="Nome"/>
            <p align="left">  Data de Nascimento:<br></p>
            <input type="date" name="nascimento" placeholder="Valor"/>
            <p align="left">  Endereco:<br></p>
            <input type="text" name="endereco" placeholder="Endereço">
            <p align="left">  CPF:<br></p>
            <input type="text" name="cpf" placeholder="CPF">
            <p align="left">  Telefone:<br></p>
            <input type="text" name="telefone" placeholder="Telefone">
            <p align="left">  Celular:<br></p>
            <input type="text" name="celular" placeholder="Celular">
            <p align="left">  Facebook:<br></p>
            <input type="text" name="face" placeholder="Facebook">
            <p align="left">  Instagram:<br></p>
            <input type="text" name="insta" placeholder="Instagram">
            <br>
            <br>
            <button name="Cadastrar"><font color="black">Cadastrar</font></button>
            <br>
            <br>
            <p align="left">  Nome:<br></p>
            <input type="text" name="nomeBusc" placeholder="Nome"/>
            <button name="Buscar"><font color="black">Buscar</font></button>
            <p align="left">  Data:<br></p>
            <input type="date" name="dataBusc" placeholder="Nome"/>
            <button name="Buscardt"><font color="black">Buscar</font></button>
            <br>
            <br>
        </form>
         <?php
        include_once "Conexao.php";
        if (isset($_POST["Cadastrar"])) {
            $sql = mysqli_query($con, "INSERT INTO clientes VALUES ('','$_POST[nome]','$_POST[nascimento]',"
                            . "'$_POST[endereco]','$_POST[cpf]','$_POST[telefone]','$_POST[celular]'"
                            . ",'$_POST[face]','$_POST[insta]')");
            
        }
        if(isset($_POST["Buscar"])){
            ?>
            <table>
                <tr>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                </tr> <?php
                $sql = mysqli_query($con, "SELECT * FROM clientes WHERE nome LIKE '$_POST[nomeBusc]%'");
                while ($row = mysqli_fetch_array($sql)) {
                    $id = $row["id"];
                    $nome = $row["nome"];
                    $nascimento = $row["dtnascimento"];
                    ?>
                    <tr><td><?= $nome ?></td>
                        <td><?= date('d/m/Y', strtotime($nascimento)); ?></td>
                        <td><a href="AlteraC.php?id=<?= $id ?>">Alterar</a></td>
                        <td><a href="deleteC.php?id=<?= $id ?>">Excluir</a></td>
                        <?php
                    }
        }
                ?> 
            </tr>
        </table>
        <?php
        if(isset($_POST["Buscardt"])){
            ?>
            <table>
                <tr>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                </tr> <?php
                $sql = mysqli_query($con, "SELECT * FROM clientes WHERE dtnascimento BETWEEN '$_POST[dataBusc]' AND '$_POST[dataBusc]'");
                while ($row = mysqli_fetch_array($sql)) {
                    $id = $row["id"];
                    $nome = $row["nome"];
                    $nascimento = $row["dtnascimento"];
                    ?>
                    <tr><td><?= $nome ?></td>
                        <td><?= date('d/m/Y', strtotime($nascimento)); ?></td>
                        <td><a href="AlteraC.php?id=<?= $id ?>">Alterar</a></td>
                        <td><a href="deleteC.php?id=<?= $id ?>">Excluir</a></td>
                        <?php
                    }
        }
                ?> 
            </tr>
        </table>
    </body>
</html>
