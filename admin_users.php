<?php
require_once __DIR__ . '/admin_required.php';

require_once __DIR__ . '/src/Core/DatabaseConnectionInterface.php';
require_once __DIR__ . '/src/Infrastructure/MySQLiConnection.php';
require_once __DIR__ . '/src/Domain/User.php';
require_once __DIR__ . '/src/Domain/UserAdminRepository.php';
require_once __DIR__ . '/src/Infrastructure/MySQLUserAdminRepository.php';

use Infrastructure\MySQLiConnection;
use Infrastructure\MySQLUserAdminRepository;

$db = new MySQLiConnection();
$repo = new MySQLUserAdminRepository($db);
$users = $repo->findAll();

require_once __DIR__ . '/header_auth.php';
?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h4">Usuários</h1>
  <a class="btn btn-primary" href="admin_user_edit.php">Novo usuário</a>
</div>
<table class="table table-striped">
  <thead>
    <tr><th>ID</th><th>Nome</th><th>E-mail</th><th>Perfil</th><th style="width:180px;">Ações</th></tr>
  </thead>
  <tbody>
  <?php foreach ($users as $u): ?>
    <tr>
      <td><?= $u->id ?></td>
      <td><?= htmlspecialchars($u->name) ?></td>
      <td><?= htmlspecialchars($u->email) ?></td>
      <td><span class="badge bg-secondary"><?= htmlspecialchars($u->role) ?></span></td>
      <td>
        <a class="btn btn-sm btn-outline-primary" href="admin_user_edit.php?id=<?= $u->id ?>">Editar</a>
        <a class="btn btn-sm btn-outline-danger" href="admin_user_delete.php?id=<?= $u->id ?>" onclick="return confirm('Remover este usuário?');">Remover</a>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
</div></body></html>
