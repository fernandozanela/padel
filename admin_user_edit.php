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

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$user = $id ? $repo->findById($id) : null;

require_once __DIR__ . '/header_auth.php';
?>
<h1 class="h4 mb-3"><?= $user ? "Editar usuário #{$id}" : "Novo usuário" ?></h1>
<form method="post" action="admin_user_save.php">
  <input type="hidden" name="id" value="<?= $user ? $user->id : 0 ?>">
  <div class="mb-3">
    <label class="form-label">Nome</label>
    <input class="form-control" name="nome" value="<?= $user ? htmlspecialchars($user->name) : '' ?>" required>
  </div>
  <div class="mb-3">
    <label class="form-label">E-mail</label>
    <input type="email" class="form-control" name="email" value="<?= $user ? htmlspecialchars($user->email) : '' ?>" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Perfil</label>
    <select class="form-select" name="role">
      <?php $r = $user ? $user->role : 'user'; ?>
      <option value="user" <?= $r==='user'?'selected':''; ?>>Usuário</option>
      <option value="admin" <?= $r==='admin'?'selected':''; ?>>Admin</option>
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label"><?= $user ? 'Nova senha (opcional)' : 'Senha' ?></label>
    <input type="password" class="form-control" name="senha" <?= $user ? '' : 'required' ?>>
    <?php if ($user): ?>
      <div class="form-text">Deixe em branco para manter a senha atual.</div>
    <?php endif; ?>
  </div>
  <button class="btn btn-primary">Salvar</button>
  <a class="btn btn-secondary" href="admin_users.php">Cancelar</a>
</form>
</div></body></html>
