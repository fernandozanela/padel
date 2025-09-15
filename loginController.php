<?php
require_once __DIR__ . '/src/Core/DatabaseConnectionInterface.php';
require_once __DIR__ . '/src/Infrastructure/MySQLiConnection.php';
require_once __DIR__ . '/src/Domain/User.php';
require_once __DIR__ . '/src/Domain/UserRepository.php';
require_once __DIR__ . '/src/Domain/PasswordHasher.php';
require_once __DIR__ . '/src/Infrastructure/MySQLUserRepository.php';
require_once __DIR__ . '/src/Infrastructure/BcryptHasher.php';
require_once __DIR__ . '/src/Application/AuthService.php';

use Infrastructure\MySQLiConnection;
use Infrastructure\MySQLUserRepository;
use Infrastructure\BcryptHasher;
use Application\AuthService;

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    $db = new MySQLiConnection();
    $repo = new MySQLUserRepository($db);
    $hasher = new BcryptHasher();
    $auth = new AuthService($repo, $hasher);

    $user = $auth->authenticate($email, $password);
    if ($user) {
        $_SESSION['user'] = $user;
        header('Location: index.php');
        exit;
    } else {
        header('Location: login.php?erro=1');
        exit;
    }
}

header('Location: login.php');
