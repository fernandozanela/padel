<?php include("layout/header.php"); ?>

<?php
include_once("_conexao.php");
$conexao = conectaBD();

// Recebe dados do formulário com escape para evitar SQL Injection
$data        = mysqli_real_escape_string($conexao, $_POST["input_data"] ?? '');
$horario     = mysqli_real_escape_string($conexao, $_POST["input_horario"] ?? '');
$fk_jogador  = intval($_POST["input_fk_jogador"] ?? 0);
$fk_quadra   = intval($_POST["input_fk_quadra"] ?? 0);

// Validação simples
if (!$data || !$horario || !$fk_jogador || !$fk_quadra) {
    echo "<div class='alert alert-danger text-center mt-4'>Todos os campos são obrigatórios!</div>";
    include("layout/footer.php");
    exit;
}

// Inserção no banco (id_reserva é auto_increment)
$sql = "INSERT INTO reserva (data, horario, fk_jogador, fk_quadra)
        VALUES ('$data', '$horario', $fk_jogador, $fk_quadra)";

?>

<div class="container mt-5 text-center">
<?php
if (mysqli_query($conexao, $sql)) {
    echo "<div class='alert alert-success'>Reserva cadastrada com sucesso!</div>";
    echo "<a href='reservaSelect.php' class='btn btn-primary mt-3'>Ver todas as reservas</a>";
} else {
    echo "<div class='alert alert-danger'>Erro ao cadastrar reserva: " . mysqli_error($conexao) . "</div>";
    echo "<a href='reserva.php' class='btn btn-secondary mt-3'>Voltar</a>";
}

mysqli_close($conexao);
?>
</div>

<?php include("layout/footer.php"); ?>
