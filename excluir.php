<?php

include('config.php');

$prod_codigo = intval($_GET['codigo']);

$sql_code = "DELETE FROM controle WHERE id = '$prod_codigo'";
$sql = $conexao->query($sql_code) or die($conexao->error);

if($sql){
    echo "<script> location.href='estoque.php'</script>";
} else {
    echo "<script>
    alert('Não foi possível excluir o produto.');
    location.href='estoque.php';
    </script>"; 
}


?>