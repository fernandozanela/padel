<?php
require_once __DIR__ . '/admin_required.php';

require_once __DIR__ . '/src/Core/DatabaseConnectionInterface.php';
require_once __DIR__ . '/src/Infrastructure/MySQLiConnection.php';
require_once __DIR__ . '/src/Domain/UserAdminRepository.php';
require_once __DIR__ . '/src/Domain/PasswordHasher.php';
require_once __DIR__ . '/src/Infrastructure/MySQLUserAdminRepository.php';
require_once __DIR__ . '/src/Infrastructure/BcryptHasher.php';
require_once __DIR__ . '/src/Application/UserAdminService.php';

use Infrastructure\MySQLiConnection;
use Infrastructure\MySQLUserAdminRepository;
use Infrastructure\BcryptHasher;
use Application\UserAdminService;

$id = (int)($_POST['id'] ?? 0);
$nome = trim($_POST['nome'] ?? '');
$email = trim($_POST['email'] ?? '');
$senha = $_POST['senha'] ?? '';
$role = $_POST['role'] ?? 'user';

$db = new MySQLiConnection();
$repo = new MySQLUserAdminRepository($db);
$hasher = new BcryptHasher();
$service = new UserAdminService($repo, $hasher);

if ($id > 0) {
    $service->update($id, $nome, $email, $senha ?: null, $role);
} else {
    $service->create($nome, $email, $senha, $role);
}

header('Location: admin_users.php');
