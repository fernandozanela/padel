<?php include("layout/header.php"); ?>

<?php
include_once("_conexao.php");
$conexao = conectaBD();

$id = $_POST["input_id_clube"];
$nome = $_POST["input_nome"];
$telefone = $_POST["input_telefone"];

$sql = "UPDATE clube 
        SET nome = '$nome', telefone = '$telefone'
        WHERE id_clube = $id";

if (mysqli_query($conexao, $sql)) {
    echo "Clube atualizado com sucesso!<br><br>";
    echo "<a href='clubeSelect.php'></a>";
} else {
    echo "Erro ao atualizar: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>
<div class="container mt-3">
    <a href="jogadorSelect.php" class="btn btn-primary">Voltar à lista</a>
</div>

<?php include("layout/footer.php"); ?>
