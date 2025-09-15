<?php
require_once __DIR__ . '/auth_required.php';
if (!isset($_SESSION['user']) || ($_SESSION['user']['role'] ?? 'user') !== 'admin') {
    http_response_code(403);
    echo "<h1>Acesso negado</h1><p>Somente administradores.</p>";
    exit;
}
