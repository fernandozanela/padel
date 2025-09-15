<?php
namespace Infrastructure;

use Core\DatabaseConnectionInterface;

class MySQLiConnection implements DatabaseConnectionInterface {
    /** @var \mysqli|null */
    private $conn = null;

    public function getConnection() {
        if ($this->conn === null) {
            // Reuse the project's existing connection settings
            require_once __DIR__ . '/../../_conexao.php';
            $this->conn = conectaBD();
        }
        return $this->conn;
    }
}
