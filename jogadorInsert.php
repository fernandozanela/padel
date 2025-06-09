<?php include("layout/header.php"); ?>

<?php
include_once("_conexao.php");
$conexao = conectaBD();

$nome = $_POST["input_nome"];
$categoria = $_POST["input_categoria"];

$sql_max = "SELECT MAX(id_jogador) AS max_id FROM jogador";
$res_max = mysqli_query($conexao, $sql_max);
$row = mysqli_fetch_assoc($res_max);
$novo_id = $row['max_id'] + 1;

$sql = "INSERT INTO jogador (id_jogador, nome, categoria)
        VALUES ($novo_id, '$nome', '$categoria')";

if (mysqli_query($conexao, $sql)) {
    echo "Jogador cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>
<?php include("layout/footer.php"); ?>
