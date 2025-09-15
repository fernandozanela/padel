<?php
namespace Infrastructure;

use Domain\User;
use Domain\UserAdminRepository;
use Core\DatabaseConnectionInterface;

class MySQLUserAdminRepository implements UserAdminRepository {
    private DatabaseConnectionInterface $db;

    public function __construct(DatabaseConnectionInterface $db) { $this->db = $db; }

    public function findAll(): array {
        $conn = $this->db->getConnection();
        $rs = $conn->query("SELECT id, nome, email, senha_hash, IFNULL(role,'user') as role, created_at FROM users ORDER BY id DESC");
        $out = [];
        while ($row = $rs->fetch_assoc()) {
            $out[] = new User((int)$row['id'], $row['nome'], $row['email'], $row['senha_hash'], $row['role']);
        }
        return $out;
    }

    public function findById(int $id): ?User {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("SELECT id, nome, email, senha_hash, IFNULL(role,'user') as role FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $rs = $stmt->get_result();
        if ($row = $rs->fetch_assoc()) {
            return new User((int)$row['id'], $row['nome'], $row['email'], $row['senha_hash'], $row['role']);
        }
        return null;
    }

    public function create(string $nome, string $email, string $senhaHash, string $role): int {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("INSERT INTO users (nome, email, senha_hash, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nome, $email, $senhaHash, $role);
        $stmt->execute();
        return $conn->insert_id;
    }

    public function update(int $id, string $nome, string $email, ?string $senhaHash, string $role): void {
        $conn = $this->db->getConnection();
        if ($senhaHash) {
            $stmt = $conn->prepare("UPDATE users SET nome=?, email=?, senha_hash=?, role=? WHERE id=?");
            $stmt->bind_param("ssssi", $nome, $email, $senhaHash, $role, $id);
        } else {
            $stmt = $conn->prepare("UPDATE users SET nome=?, email=?, role=? WHERE id=?");
            $stmt->bind_param("sssi", $nome, $email, $role, $id);
        }
        $stmt->execute();
    }

    public function delete(int $id): void {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("DELETE FROM users WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}
