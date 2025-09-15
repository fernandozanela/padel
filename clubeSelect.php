<?php
require_once "_conexao.php";
require_once "repositories/MySQLClubeRepository.php";
require_once "services/ClubeService.php";

$repository = new MySQLClubeRepository($conn);
$service = new ClubeService($repository);

$clubes = $service->listarClubes();
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Lista de Clubes</title>
</head>

<body>
    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'created') echo '<p>Clube cadastrado com sucesso!</p>'; ?>
    <a href="index.html">Voltar</a>
    <h2>Clubes</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cidade</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($clubes as $clube): ?>
        <tr>
            <td><?php echo $clube['id']; ?></td>
            <td><?php echo htmlspecialchars($clube['nome']); ?></td>
            <td><?php echo htmlspecialchars($clube['cidade']); ?></td>
            <td>
                <a href="clubeEditar.php?id=<?php echo $clube['id']; ?>">Editar</a> |
                <a href="clubeDelete.php?id=<?php echo $clube['id']; ?>"
                    onclick="return confirm('Deletar?')">Deletar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <h3>Novo Clube</h3>
    <form method="POST" action="clubeInsert.php">
        Nome: <input type="text" name="nome" required><br>
        Cidade: <input type="text" name="cidade" required><br>
        <button type="submit">Salvar</button>
    </form>
</body>

</html>