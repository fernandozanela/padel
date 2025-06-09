<?php include("layout/header.php"); ?>
<?php include_once("_conexao.php"); ?>

<div class="container mt-5">
   <div class="card shadow p-4">
      <h2 class="mb-4 text-primary">Lista de Jogadores</h2>

      <table class="table table-bordered table-striped">
         <thead class="table-dark">
            <tr>
               <th>ID</th>
               <th>Nome</th>
               <th>Categoria</th>
               <th>Alterar</th>
               <th>Excluir</th>
            </tr>
         </thead>
         <tbody>
            <?php
            $conexao = conectaBD();
            $sql = "SELECT * FROM jogador;";
            $resultado = mysqli_query($conexao, $sql);

            while ($i = mysqli_fetch_assoc($resultado)) {
               echo "<tr>";
               echo "<td>{$i['id_jogador']}</td>";
               echo "<td>{$i['nome']}</td>";
               echo "<td>{$i['categoria']}</td>";
               echo "<td><a class='btn btn-sm btn-warning' href='jogadorEditar.php?var_id={$i['id_jogador']}&var_nome={$i['nome']}&var_categoria={$i['categoria']}'>Alterar</a></td>";
               echo "<td><a class='btn btn-sm btn-danger' href='jogadorDelete.php?var_id={$i['id_jogador']}'>Excluir</a></td>";
               echo "</tr>";
            }

            mysqli_close($conexao);
            ?>
         </tbody>
      </table>

      <a href="jogador.php" class="btn btn-success mt-3">Cadastrar novo Jogador</a>
   </div>
</div>

<?php include("layout/footer.php"); ?>
