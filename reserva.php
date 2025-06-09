<?php include("layout/header.php"); ?>

<?php
include_once("_conexao.php");
$conn = conectaBD();
?>

<div class="container mt-5">
    <h2 class="mb-4 text-warning text-center">Cadastro de Reserva de Quadra</h2>

    <form action="reservaInsert.php" method="post" style="max-width: 600px;" class="mx-auto shadow p-4 bg-light rounded">
        
        <div class="mb-3">
            <label class="form-label"><b>Quadra:</b></label>
            <select name="input_fk_quadra" class="form-select" required>
                <option value="">Selecione</option>
                <?php
                    $sql_quadras = "SELECT q.id_quadra, q.nome AS nome_quadra, c.nome AS nome_clube
                                    FROM quadra q
                                    INNER JOIN clube c ON q.fk_clube = c.id_clube
                                    ORDER BY c.nome, q.nome";
                    $res_quadras = mysqli_query($conn, $sql_quadras);
                    while ($q = mysqli_fetch_assoc($res_quadras)) {
                        echo "<option value='{$q['id_quadra']}'>Quadra: {$q['nome_quadra']} (Clube: {$q['nome_clube']})</option>";
                    }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label"><b>Jogador:</b></label>
            <select name="input_fk_jogador" class="form-select" required>
                <option value="">Selecione</option>
                <?php
                    $sql_jogadores = "SELECT * FROM jogador ORDER BY nome";
                    $res_jogadores = mysqli_query($conn, $sql_jogadores);
                    while ($j = mysqli_fetch_assoc($res_jogadores)) {
                        echo "<option value='{$j['id_jogador']}'>{$j['nome']} ({$j['categoria']})</option>";
                    }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label"><b>Data:</b></label>
            <input type="date" name="input_data" class="form-control" required>
        </div>

        <div class="mb-4">
            <label class="form-label"><b>Horário:</b></label>
            <input type="time" name="input_horario" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Cadastrar Reserva</button>
        <button type="reset" class="btn btn-secondary ms-2">Limpar</button>

    </form>
</div>

<?php include("layout/footer.php"); ?>
