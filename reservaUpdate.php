<?php include("layout/header.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Reserva</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">

<?php
include_once("_conexao.php");
$conexao = conectaBD();

// Recebendo os dados do formulário
$id          = $_POST["input_id_reserva"];
$data        = $_POST["input_data"];
$horario     = $_POST["input_horario"];
$fk_jogador  = $_POST["input_fk_jogador"];
$fk_quadra   = $_POST["input_fk_quadra"];

// Validação básica
if (!$id || !$data || !$horario || !$fk_jogador || !$fk_quadra) {
    echo "<div class='alert alert-danger'>Todos os campos são obrigatórios!</div>";
    echo "<a href='reservaSelect.php' class='btn btn-secondary mt-3'>Voltar</a>";
    exit;
}

// Montando a query
$SQL = "UPDATE reserva
        SET data = '$data',
            horario = '$horario',
            fk_jogador = $fk_jogador,
            fk_quadra = $fk_quadra
        WHERE id_reserva = $id";

// Executando a atualização
if (mysqli_query($conexao, $SQL)) {
    echo "<div class='alert alert-success'>Reserva atualizada com sucesso!</div>";
    echo "<a href='reservaSelect.php' class='btn btn-primary'>Ver todas as reservas</a>";
} else {
    echo "<div class='alert alert-danger'>Erro ao atualizar: " . mysqli_error($conexao) . "</div>";
    echo "<a href='reservaSelect.php' class='btn btn-secondary mt-3'>Voltar</a>";
}

mysqli_close($conexao);
?>

        </div>
    </div>
</div>

</body>
</html>
<?php include("layout/footer.php"); ?>
