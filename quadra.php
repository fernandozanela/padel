<?php include("layout/header.php"); ?>

<h2 class="mb-4 text-primary">Cadastro de Clubes</h2>

    <form action="quadraInsert.php" method="post">

    <div class="mb-3">
        <label for="input_id_quadra" class="form-label">ID_quadra</label>
        <input type="number" name="input_id_quadra" id="input_id_quadra" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="input_nome" class="form-label">Nome</label>
        <input type="text" name="input_nome" id="input_nome" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="input_valor" class="form-label">Valor</label>
        <input type="text" name="input_valor" id="input_valor" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label for="input_fk_clube" class="form-label">fk_clube</label>
        <input type="text" name="input_fk_clube" id="input_fk_clube" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Cadastrar</button>
    <button type="reset" class="btn btn-secondary">Limpar</button>


</form>

<?php include("layout/footer.php"); ?>
