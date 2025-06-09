<?php include("layout/header.php"); ?>

<?php
    // criar conexao
    include_once("_conexao.php");
    $conexao= conectaBD();

    $id = filter_input(INPUT_GET, "var_id");
    $dados= "DELETE FROM quadra WHERE id_quadra = {$id}";

    mysqli_query($conexao, $dados) or die(mysqli_error());

    echo "Excluído com Sucesso!";

    mysqli_close($conexao);
?>
<?php include("layout/footer.php"); ?>
