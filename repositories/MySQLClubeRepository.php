<?php
require_once "ClubeRepository.php";

class MySQLClubeRepository implements ClubeRepository {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function salvar(Clube $clube) {
        $stmt = $this->conn->prepare("INSERT INTO clube (nome, cidade) VALUES (?, ?)");
        $stmt->bind_param("ss", $clube->getNome(), $clube->getCidade());
        return $stmt->execute();
    }

    public function listar() {
        $result = $this->conn->query("SELECT * FROM clube");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function buscarPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM clube WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function atualizar(Clube $clube) {
        $stmt = $this->conn->prepare("UPDATE clube SET nome = ?, cidade = ? WHERE id = ?");
        $stmt->bind_param("ssi", $clube->getNome(), $clube->getCidade(), $clube->getId());
        return $stmt->execute();
    }

    public function deletar($id) {
        $stmt = $this->conn->prepare("DELETE FROM clube WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
