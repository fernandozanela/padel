<?php include("layout/header.php"); ?>

<?php
include_once("_conexao.php");
$conexao = conectaBD();

$id = $_POST['input_id_jogador'] ?? '';
$nome = $_POST['input_nome'] ?? '';
$categoria = $_POST['input_categoria'] ?? '';

if (empty($id) || empty($nome) || empty($categoria)) {
    echo "<div class='alert alert-danger container mt-5'>Todos os campos são obrigatórios!</div>";
    include("layout/footer.php");
    exit;
}

$nome = mysqli_real_escape_string($conexao, $nome);
$categoria = (int)$categoria;

$sql = "UPDATE jogador 
        SET nome = '$nome', categoria = $categoria 
        WHERE id_jogador = $id";

if (mysqli_query($conexao, $sql)) {
    echo "Jogador atualizado com sucesso!";
} else {
    echo "Erro ao atualizar jogador: " . mysqli_error($conexao) . "</div>";
}

mysqli_close($conexao);
?>

<div class="container mt-3">
    <a href="jogadorSelect.php" class="btn btn-primary">Voltar à lista</a>
</div>

<?php include("layout/footer.php"); ?>

