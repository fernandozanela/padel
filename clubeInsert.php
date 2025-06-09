<?php include("layout/header.php"); ?>

<?php
include_once("_conexao.php");
$conexao = conectaBD();

$nome = $_POST["input_nome"];
$telefone        = $_POST["input_telefone"];

$sql_max = "SELECT MAX(id_clube) AS max_id FROM clube";
$res_max = mysqli_query($conexao, $sql_max);
$row = mysqli_fetch_assoc($res_max);
$novo_id = $row['max_id'] + 1;

$sql = "INSERT INTO clube (id_clube, nome, telefone)
        VALUES ($novo_id, '$nome', '$telefone')";

if (mysqli_query($conexao, $sql)) {
    echo "Clube cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>
<?php include("layout/footer.php"); ?>