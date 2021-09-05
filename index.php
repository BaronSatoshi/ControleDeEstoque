<?php

include('config.php');

if(isset($_POST['submit'])){

    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $quant = $_POST['quant'];
    $dataVenc = $_POST['data'];


    $sql = $conexao->query("SELECT * FROM controle WHERE codigo = '$codigo'");
    if(mysqli_num_rows($sql) > 0){
        echo "<script>alert('Produto já existente no banco!!')</script>";
    } else {
        $sql_insert = "INSERT INTO controle(codigo, nome, quantidade, venc) VALUES('$codigo', '$nome', '$quant', '$dataVenc')";
        $result = mysqli_query($conexao, $sql_insert);
        if($result){
            echo "<script>alert('Produto Cadastrado!!')</script>";
        }else {
            echo "<script>alert('Algo deu Errado!!')</script>";
        }
    }

    /*$sql = "INSERT INTO controle(codigo, nome, quantidade, venc) VALUES('$codigo', '$nome', '$quant', '$dataVenc')";
    $result = mysqli_query($conexao, $sql);
    if($result){
        echo "<script>alert('Produto Cadastrado!!')</script>";
    }else {
        echo "<script>alert('Algo deu Errado!!')</script>";
    }*/
}


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editar.css">
    <title>Controle de Estoque</title>
</head>
<body>
<a href="estoque.php">Visualizar estoque</a>
    <section>
        <div class="container">
            <h1>Cadastre seu Produto</h1>
            <form action="" method="POST">
                <input class="input" type="text" name="codigo" id="codigo" placeholder="Código do Produto" required>
                <br><br>
                <input class="input" type="text" name="nome" id="nome" placeholder="Nome do Produto" required>
                <br><br>
                <input class="input" type="number" name="quant" id="quant" placeholder="Quantidade de Produtos" required>
                <br><br>
                <label for="data"><strong>Data de Vencimento</strong></label>
                <input class="input" type="date" name="data" id="data" required>
                <br><br>
                <input id="botao" type="submit" name="submit" value="Cadastrar">
            </form>
        </div>
    </section>
</body>
</html>