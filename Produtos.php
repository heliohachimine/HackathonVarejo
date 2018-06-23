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
            <p align="left">  Valor De Compra:<br></p>
            <input type="text" name="valor" placeholder="Valor"/>
            <p align="left">  Valor De Venda:<br></p>
            <input type="text" name="valorVenda" placeholder="Valor"/>
            <p align="left">  Tamanho:<br></p>
            <input type="text" name="tamanho" placeholder="Tamanho">
            <p align="left">  Categoria:<br></p>
            <input type="text" name="categoria" placeholder="Categoria">
            <br>
            <br>
            <button name="Cadastrar"><font color="black">Cadastrar</font></button>
            <br>
            <br>
            <p align="left">  Nome:<br></p>
            <input type="text" name="nomeBusc" placeholder="Nome"/>
            <button name="Buscar"><font color="black">Buscar</font></button>
            <br>
            <br>
        </form>
         <?php
        include_once "Conexao.php";
        if (isset($_POST["Cadastrar"])) {
            $sql = mysqli_query($con, "INSERT INTO produtos VALUES ('','$_POST[nome]','$_POST[valor]',"
                            . "'$_POST[tamanho]','$_POST[categoria]','$_POST[valorVenda]')");
            
        }
        if(isset($_POST["Buscar"])){
            ?>
            <table>
                <tr>
                    <th>Nome</th>
                    <th>Valor de Compra</th>
                    <th>Valor de Venda</th>
                    <th>Tamanho</th>
                    <th>Categoria</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                </tr> <?php
                $sql = mysqli_query($con, "SELECT * FROM produtos WHERE nome LIKE '$_POST[nomeBusc]%'");
                while ($row = mysqli_fetch_array($sql)) {
                    $id = $row["id"];
                    $nome = $row["nome"];
                    $valor_compra = $row["valor_compra"];
                    $valor_venda = $row["valor_venda"];
                    $tamanho = $row["tamanho"];
                    $categoria = $row["categoria"];
                    ?>
                    <tr><td><?= $nome ?></td>
                        <td><?= $valor_compra ?></td>
                        <td><?= $valor_venda ?></td>
                        <td><?= $tamanho?></td>
                        <td><?= $categoria ?></td>
                        <td><a href="AlteraP.php?id=<?= $id ?>">Alterar</a></td>
                        <td><a href="deleteP.php?id=<?= $id ?>">Excluir</a></td>
                        <?php
                    }
        }
                ?> 
            </tr>
        </table>
    </body>
</html>
