<?php
// tools/setup_users.php
// Executar 1x no navegador: http://seu-host/padel/tools/setup_users.php
require_once __DIR__ . '/../src/Core/DatabaseConnectionInterface.php';
require_once __DIR__ . '/../src/Infrastructure/MySQLiConnection.php';

use Infrastructure\MySQLiConnection;

$db = new MySQLiConnection();
$conn = $db->getConnection();

$sql = <<<SQL
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  senha_hash VARCHAR(255) NOT NULL,
  role VARCHAR(50) DEFAULT 'user',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
SQL;

if (!$conn->query($sql)) {
    die('Erro ao criar tabela users: ' . $conn->error);
}

// Se não houver nenhum usuário, cria um admin padrão
$check = $conn->query("SELECT COUNT(*) as c FROM users");
$row = $check->fetch_assoc();
if ((int)$row['c'] === 0) {
    $email = 'admin@exemplo.com';
    $nome = 'Admin';
    $senhaHash = password_hash('admin123', PASSWORD_BCRYPT);
    $role = 'admin';
    $stmt = $conn->prepare("INSERT INTO users (nome, email, senha_hash, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nome, $email, $senhaHash, $role);
    $stmt->execute();
    echo "<p>Usuário inicial criado: <strong>{$email}</strong> / senha <strong>admin123</strong></p>";
} else {
    echo "<p>Tabela <code>users</code> já existe e contém usuários.</p>";
}
echo "<p>✔️ Setup finalizado.</p>";
