<?php include("layout/header.php"); ?>

<h2 class="mb-4 text-primary">Cadastro de Clubes</h2>

<form action="clubeInsert.php" method="post">

    <div class="mb-3">
        <label for="input_id_clube" class="form-label">ID do Clube</label>
        <input type="number" name="input_id_clube" id="input_id_clube" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="input_nome" class="form-label">Nome do Clube</label>
        <input type="text" name="input_nome" id="input_nome" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="input_telefone" class="form-label">Telefone</label>
        <input type="text" name="input_telefone" id="input_telefone" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Cadastrar</button>
    <button type="reset" class="btn btn-secondary">Limpar</button>


</form>

<?php include("layout/footer.php"); ?>
