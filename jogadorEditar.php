<?php include("layout/header.php");

$id = $_GET['var_id'] ?? '';
$nome = $_GET['var_nome'] ?? '';
$categoria = $_GET['var_categoria'] ?? '';

if (empty($id)) {
    echo "<div class='alert alert-danger'>ID do jogador não fornecido.</div>";
    include("layout/footer.php");
    exit;
}
?>

<div class="container mt-5">
    <h2 class="mb-4 text-warning text-center">Editar Jogador</h2>

    <form action="jogadorUpdate.php" method="post" style="max-width: 500px;" class="mx-auto shadow p-4 bg-light rounded">
        <input type="hidden" name="input_id_jogador" value="<?php echo htmlspecialchars($id); ?>">

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="input_nome" class="form-control" value="<?php echo htmlspecialchars($nome); ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Categoria</label>
            <input type="number" name="input_categoria" class="form-control" value="<?php echo htmlspecialchars($categoria); ?>" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar Alterações</button>
        <a href="jogadorSelect.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php include("layout/footer.php"); ?>
