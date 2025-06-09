<?php include("layout/header.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Edição de Reserva</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
$get1 = filter_input(INPUT_GET, "var_id");
$get2 = filter_input(INPUT_GET, "var_horario");
$get3 = filter_input(INPUT_GET, "var_data");
$get4 = filter_input(INPUT_GET, "var_fk_quadra");
$get5 = filter_input(INPUT_GET, "var_fk_jogador");

include_once("_conexao.php");
$conn = conectaBD();
?>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <h4 class="text-primary mb-4">Edição de Reserva</h4>

            <form action="reservaUpdate.php" method="post">
                <input type="hidden" name="tabela" value="reserva">

                <div class="mb-3">
                    <label class="form-label"><strong>ID Reserva</strong></label>
                    <input type="number" name="input_id_reserva" class="form-control" value="<?php echo $get1 ?>" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>Horário</strong></label>
                    <input type="time" name="input_horario" class="form-control" value="<?php echo $get2 ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>Data</strong></label>
                    <input type="date" name="input_data" class="form-control" value="<?php echo $get3 ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>Quadra</strong></label>
                    <select name="input_fk_quadra" class="form-select" required>
                        <option value="">Selecione</option>
                        <?php
                        $sql_quadras = "SELECT q.id_quadra, q.nome AS nome_quadra, c.nome AS nome_clube
                                        FROM quadra q
                                        INNER JOIN clube c ON q.fk_clube = c.id_clube
                                        ORDER BY c.nome, q.nome";
                        $res_quadras = mysqli_query($conn, $sql_quadras);
                        while ($q = mysqli_fetch_assoc($res_quadras)) {
                            $selected = ($q['id_quadra'] == $get4) ? "selected" : "";
                            echo "<option value='{$q['id_quadra']}' $selected>Quadra: {$q['nome_quadra']} (Clube: {$q['nome_clube']})</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>Jogador</strong></label>
                    <select name="input_fk_jogador" class="form-select" required>
                        <option value="">Selecione</option>
                        <?php
                        $sql_jogadores = "SELECT * FROM jogador ORDER BY nome";
                        $res_jogadores = mysqli_query($conn, $sql_jogadores);
                        while ($j = mysqli_fetch_assoc($res_jogadores)) {
                            $selected = ($j['id_jogador'] == $get5) ? "selected" : "";
                            echo "<option value='{$j['id_jogador']}' $selected>{$j['nome']} ({$j['categoria']})</option>";
                        }
                        ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-success w-100">Salvar</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
<?php include("layout/footer.php"); ?>
