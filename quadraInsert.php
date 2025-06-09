<?php 
include("layout/header.php");
include_once("_conexao.php");
$conexao = conectaBD();

$nome = $_POST["input_nome"] ?? '';
$valor = $_POST["input_valor"] ?? '';
$fkclube = $_POST["input_fk_clube"] ?? '';

if (empty($nome) || empty($valor) || empty($fkclube)) {
    echo "<div class='alert alert-danger'>Todos os campos são obrigatórios.</div>";
} else {
    $sql = "INSERT INTO quadra(nome, valor, fk_clube)
            VALUES ('$nome', '$valor', '$fkclube')";

    if (mysqli_query($conexao, $sql)) {
        echo "<div class='alert alert-success'>Quadra cadastrada com sucesso!</div>";
    } else {
        echo "<div class='alert alert-danger'>Erro ao cadastrar: " . mysqli_error($conexao) . "</div>";
    }

    mysqli_close($conexao);
}
include("layout/footer.php");
?>
