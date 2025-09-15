<?php
require_once __DIR__ . '/admin_required.php';

require_once __DIR__ . '/src/Core/DatabaseConnectionInterface.php';
require_once __DIR__ . '/src/Infrastructure/MySQLiConnection.php';
require_once __DIR__ . '/src/Domain/UserAdminRepository.php';
require_once __DIR__ . '/src/Infrastructure/MySQLUserAdminRepository.php';

use Infrastructure\MySQLiConnection;
use Infrastructure\MySQLUserAdminRepository;

$id = (int)($_GET['id'] ?? 0);
if ($id > 0) {
    $db = new MySQLiConnection();
    $repo = new MySQLUserAdminRepository($db);
    $repo->delete($id);
}
header('Location: admin_users.php');
