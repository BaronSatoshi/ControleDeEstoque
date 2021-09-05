<?php

include('config.php');

$prod_codigo = intval($_GET['codigo']);

error_reporting(0);


$sql = "SELECT * FROM controle WHERE id = '$prod_codigo'";
$sql_query = $conexao->query($sql) or die($conexao->error);
$linha = $sql_query->fetch_assoc();

$codigo = $linha['codigo'];
$nome = $linha['nome'];
$quant = $linha['quantidade'];
$data = $linha['venc'];

if(isset($_POST['submit'])){

    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $quant = $_POST['quant'];
    $data = $_POST['data'];

    $sql_code = "UPDATE controle SET codigo = '$codigo', nome = '$nome', quantidade = '$quant', venc = '$data' WHERE id = '$prod_codigo'";
    $result = mysqli_query($conexao, $sql_code);
    if($result){
        echo "<script>alert('Produto alterado com sucesso.')</script>";
        echo "<script> location.href='estoque.php'</script>";
    } else {
        echo "<script>alert('opa, algo deu errado')";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editar.css">
    <title>Editar</title>
</head>
<body>
    <section>
        <div class="container">
            <h1>Editar Produto</h1>
            <form action="" method="POST">
                <input type="text" name="codigo" id="codigo" placeholder="Código do Produto" value="<?php echo $codigo; ?>" required>
                <br><br>
                <input type="text" name="nome" id="nome" placeholder="Nome do Produto" value="<?php echo $nome; ?>" required>
                <br><br>
                <input type="number" name="quant" id="quant" placeholder="Quantidade de Produtos" value="<?php echo $quant; ?>" required>
                <br><br>
                <label for="data"><strong>Data de Vencimento</strong></label>
                <input type="date" name="data" id="data" value="<?php echo $data; ?>" required>
                <br><br>
                <input id="botao" type="submit" name="submit" value="Editar">
            </form>
        </div>
    </section>
</body>
</html>