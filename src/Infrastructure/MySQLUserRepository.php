<?php
namespace Infrastructure;

use Domain\User;
use Domain\UserRepository;
use Core\DatabaseConnectionInterface;

class MySQLUserRepository implements UserRepository {
    private DatabaseConnectionInterface $db;

    public function __construct(DatabaseConnectionInterface $db) {
        $this->db = $db;
    }

    public function findByEmail(string $email): ?User {
        $conn = $this->db->getConnection();
        try {
            $stmt = $conn->prepare("SELECT id, nome, email, senha_hash, IFNULL(role,'user') as role FROM users WHERE email = ? LIMIT 1");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
        } catch (\mysqli_sql_exception $e) {
            // Dica amigável quando a tabela não existe
            if (strpos($e->getMessage(), "doesn't exist") !== false) {
                die("A tabela <code>users</code> não existe. Acesse <code>/tools/setup_users.php</code> para criá-la.");
            }
            throw $e;
        }
        if ($row = $result->fetch_assoc()) {
            return new User((int)$row['id'], $row['nome'], $row['email'], $row['senha_hash'], $row['role']);
        }
        return null;
    }
}
