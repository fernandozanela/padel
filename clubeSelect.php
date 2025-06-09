<?php include("layout/header.php"); ?>
<?php include_once("_conexao.php"); ?>

<div class="container mt-5">
    <div class="card shadow p-4">
        <h2 class="mb-4 text-primary">Lista de Clubes</h2>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once("_conexao.php");
                $conexao = conectaBD();
                $sql = "SELECT * FROM clube";
                $res = mysqli_query($conexao, $sql);

                while ($c = mysqli_fetch_assoc($res)) {
                    echo "<tr>
                    <td>{$c['id_clube']}</td>
                    <td>{$c['nome']}</td>
                    <td>{$c['telefone']}</td>
                    <td>
                        <a href='clubeEditar.php?var_id={$c['id_clube']}&var_nome={$c['nome']}&var_telefone={$c['telefone']}' class='btn btn-sm btn-warning'>Editar</a>
                        <a href='clubeDelete.php?var_id={$c['id_clube']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Confirmar exclusão?')\">Excluir</a>
                    </td>
                  </tr>";
                }

                mysqli_close($conexao);
                ?>
            </tbody>
        </table>

        <a href="clube.php" class="btn btn-success mt-3">Cadastrar Novo Clube</a>
    </div>
</div>
<?php include("layout/footer.php"); ?>