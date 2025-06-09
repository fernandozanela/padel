<?php 
include("layout/header.php");
require_once __DIR__ . "/_conexao.php";

$conexao = conectaBD();

$id = $_GET['var_id'] ?? '';

if (empty($id)) {
    echo "<div class='alert alert-danger'>ID da quadra não fornecido.</div>";
    include("layout/footer.php");
    exit;
}

$sqlQuadra = "SELECT * FROM quadra WHERE id_quadra = $id";
$resultQuadra = mysqli_query($conexao, $sqlQuadra);

if (!$resultQuadra || mysqli_num_rows($resultQuadra) == 0) {
    echo "<div class='alert alert-danger'>Quadra não encontrada.</div>";
    include("layout/footer.php");
    exit;
}

$quadra = mysqli_fetch_assoc($resultQuadra);

$sqlClubes = "SELECT id_clube, nome FROM clube";
$resultClubes = mysqli_query($conexao, $sqlClubes);
?>

<div class="container mt-5">
    <h2 class="mb-4 text-warning text-center">Editar Quadra</h2>

    <form action="quadraUpdate.php" method="post" style="max-width: 500px;" class="mx-auto shadow p-4 bg-light rounded">
        <input type="hidden" name="input_id_clube" value="<?php echo htmlspecialchars($quadra['id_quadra']); ?>">

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="input_nome" class="form-control" value="<?php echo htmlspecialchars($quadra['nome']); ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Valor</label>
            <input type="number" name="input_valor" step="0.01" class="form-control" value="<?php echo htmlspecialchars($quadra['valor']); ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Clube</label>
            <select name="input_fk_clube" class="form-control" required>
                <option value="">Selecione um clube</option>
                <?php while ($row = mysqli_fetch_assoc($resultClubes)) { ?>
                    <option value="<?php echo $row['id_clube']; ?>" <?php echo ($row['id_clube'] == $quadra['fk_clube']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($row['nome']); ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Salvar Alterações</button>
        <a href="quadraSelect.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php include("layout/footer.php"); ?>
