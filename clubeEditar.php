<?php
require_once "_conexao.php";
require_once "repositories/MySQLClubeRepository.php";
require_once "services/ClubeService.php";

$repository = new MySQLClubeRepository($conn);
$service = new ClubeService($repository);

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $clube = $service->buscarClube($_GET['id']);
} else {
    header('Location: clubeSelect.php');
    exit;
}
?>
<form method="POST" action="clubeUpdate.php">
    <input type="hidden" name="id" value="<?php echo $clube['id']; ?>">
    Nome: <input type="text" name="nome" value="<?php echo htmlspecialchars($clube['nome']); ?>"><br>
    Cidade: <input type="text" name="cidade" value="<?php echo htmlspecialchars($clube['cidade']); ?>"><br>
    <button type="submit">Atualizar</button>
</form>