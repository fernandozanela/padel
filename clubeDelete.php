<?php include("layout/header.php"); ?>

<?php
include_once("_conexao.php");
$conexao = conectaBD();

$id = $_GET["var_id"];

$sql = "DELETE FROM clube WHERE id_clube = $id";

if (mysqli_query($conexao, $sql)) {
    echo "Clube excluído com sucesso!<br><br>";
    echo "<a href='clubeSelect.php'>Voltar à lista</a>";
} else {
    echo "Erro ao excluir: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>
<?php include("layout/footer.php"); ?>
