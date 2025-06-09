<?php include("layout/header.php"); ?>
<?php include_once("_conexao.php"); ?>

<div class="container mt-5">
   <div class="card shadow p-4">
      <h2 class="mb-4 text-primary">Lista de Quadras</h2>

      <table class="table table-bordered table-striped">
         <thead class="table-dark">
            <tr>
               <th>ID</th>
               <th>Nome</th>
               <th>Valor</th>
               <th>Alterar</th>
               <th>Excluir</th>
            </tr>
         </thead>
         <tbody>
            <?php
            $conexao = conectaBD();
            $sql = "SELECT * FROM quadra;";
            $resultado = mysqli_query($conexao, $sql);

            while ($i = mysqli_fetch_assoc($resultado)) {
               echo "<tr>";
               echo "<td>{$i['id_quadra']}</td>";
               echo "<td>{$i['nome']}</td>";
               echo "<td>{$i['valor']}</td>";
               echo "<td><a class='btn btn-sm btn-warning' href='quadraEditar.php?var_id={$i['id_quadra']}&var_nome={$i['nome']}&var_valor={$i['valor']}>class='btn btn-sm btn-warning'>Editar</a>";
               echo "<td><a class='btn btn-sm btn-danger' href='quadraDelete.php?var_id={$i['id_quadra']}'>Excluir</a></td>";

               echo "</tr>";
            }

            mysqli_close($conexao);
            ?>
         </tbody>
      </table>

      <a href="quadra.php" class="btn btn-success mt-3">Cadastrar nova Quadra</a>
   </div>
</div>

<?php include("layout/footer.php"); ?>