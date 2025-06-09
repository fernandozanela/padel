<?php include("layout/header.php"); ?>

<?php
include_once("_conexao.php");
$conexao = conectaBD(); 
if (
    isset($_POST["input_id_clube"]) &&
    isset($_POST["input_nome"]) &&
    isset($_POST["input_valor"]) &&
    isset($_POST["input_fk_clube"])
) {
    $id     = intval($_POST["input_id_clube"]); 
    $nome   = mysqli_real_escape_string($conexao, $_POST["input_nome"]);
    $valor  = floatval($_POST["input_valor"]);
    $fk     = intval($_POST["input_fk_clube"]);

    $sql = "UPDATE quadra
            SET nome = '$nome',
                valor = $valor,
                fk_clube = $fk
            WHERE id_quadra = $id";

    if (mysqli_query($conexao, $sql)) {
        echo "<div class='alert alert-success text-center mt-4'>Alterado com sucesso!</div>";
    } else {
        echo "<div class='alert alert-danger text-center mt-4'>Erro ao atualizar: " . mysqli_error($conexao) . "</div>";
    }

    mysqli_close($conexao);
} else {
    echo "<div class='alert alert-warning text-center mt-4'>Dados incompletos enviados.</div>";
}
?>

<?php include("layout/footer.php"); ?>
