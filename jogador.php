<?php include("layout/header.php"); ?>

<h2 class="mb-4 text-primary">Cadastro de Clubes</h2>

    <form action="jogadorInsert.php" method="post">

    <div class="mb-3">
        <label for="input_id_clube" class="form-label">ID_jogador</label>
        <input type="number" name="input_id_jogador" id="input_id_jogador" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="input_nome" class="form-label">Nome</label>
        <input type="text" name="input_nome" id="input_nome" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="input_categoria" class="form-label">Categoria</label>
        <input type="text" name="input_categoria" id="input_categoria" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Cadastrar</button>
    <button type="reset" class="btn btn-secondary">Limpar</button>


</form>

<?php include("layout/footer.php"); ?>
