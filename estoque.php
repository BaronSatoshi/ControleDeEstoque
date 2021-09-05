<?php

include('config.php');


$consulta = "SELECT * FROM controle";

$con = $conexao->query($consulta) or die($conexao->error);

$hoje = date('m/d/Y');


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <script src="js/jquery-3.6.0.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="estoque.css">
    <title>Estoque</title>
</head>
<body>
    <h1>Estoque de Produtos</h1>
    <a class="btn btn-primary" style="margin-bottom: 25px;" href="index.php">Cadastrar Novo Produto</a>
    <table id="tabela" border=2 class="table table-hover ">
        <thead>
        <tr>
            <td><strong>Código</strong></td>
            <td><strong>Nome do Produto</strong></td>
            <td><strong>Quantidade</strong></td>
            <td><strong>Data de Vencimento</strong></td>
            <td><strong>Dias até o Vencimento</strong></td>
            <td><strong>Ação</strong></td>
        </tr>
        </thead>
        <?php while($dado = $con->fetch_array()){ ?>
        <tr style="background-color: #146861; color: white;" class="table">
            <td><?php echo $dado["codigo"]; ?></td>
            <td><?php echo $dado["nome"]; ?></td>
            <td><?php echo $dado["quantidade"]; ?></td>
            <td><?php echo date("d/m/Y", strtotime($dado["venc"])); ?></td>
            <td><?php echo date(strtotime($dado['venc']) - strtotime($hoje)) / (60 * 60 * 24); ?></td>
            <td><a class="btn btn-warning" href="editar.php?codigo=<?php echo $dado["id"] ?>">Editar</a> | <a class="btn btn-danger" href="javascript: if(confirm('Tem certeza que deseja excluir o produto <?php echo $dado["nome"]; ?>')) location.href='excluir.php?codigo=<?php echo $dado["id"] ?>';">Excluir</a></td>
        </tr>
        <?php } ?>
    </table>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
        $('#tabela').DataTable({
            "language": {
            "lengthMenu": "Mostrando _MENU_ registros por página",
            "zeroRecords": "Nada encontrado",
            "info": "Mostrando página _PAGE_ of _PAGES_",
            "infoEmpty": "Nenhum registro disponível",
            "infoFiltered": "(Filtrado de _MAX_ total registros)"
        },});
        
    } );
    </script>
</body>
</html>