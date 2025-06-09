<?php include("layout/header.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Lista de Reserva</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <h4 class="text-primary mb-4">Lista de Reservas</h4>
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Horário</th>
                        <th>Data</th>
                        <th>Quadra</th>
                        <th>Jogador</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include_once("_conexao.php");
                $conexao = conectaBD();

                $sql = "SELECT reserva.*, jogador.nome AS nome_jogador, quadra.nome AS nome_quadra
                        FROM reserva
                        JOIN jogador ON reserva.fk_jogador = jogador.id_jogador
                        JOIN quadra ON reserva.fk_quadra = quadra.id_quadra";

                $resultado = mysqli_query($conexao, $sql);

                while ($r = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>
                            <td>{$r['id_reserva']}</td>
                            <td>{$r['horario']}</td>
                            <td>{$r['data']}</td>
                            <td>{$r['nome_quadra']}</td>
                            <td>{$r['nome_jogador']}</td>
                            <td>
                                <a href='reservaEditar.php?var_id={$r['id_reserva']}&var_data={$r['data']}&var_horario={$r['horario']}&var_fk_jogador={$r['fk_jogador']}&var_fk_quadra={$r['fk_quadra']}' class='btn btn-warning btn-sm'>Editar</a>
                                <a href='reservaDelete.php?var_id={$r['id_reserva']}' class='btn btn-danger btn-sm'>Excluir</a>
                            </td>
                          </tr>";
                }

                mysqli_close($conexao);
                ?>
                </tbody>
            </table>

            <a href="reserva.php" class="btn btn-success w-100 mt-3">Cadastrar Nova Reserva</a>
        </div>
    </div>
</div>
</body>
</html>
<?php include("layout/footer.php"); ?>
