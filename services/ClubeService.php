<?php
require_once __DIR__ . "/../models/Clube.php";
require_once __DIR__ . "/../repositories/ClubeRepository.php";

class ClubeService {
    private $repository;

    public function __construct(ClubeRepository $repository) {
        $this->repository = $repository;
    }

    public function cadastrarClube($nome, $cidade) {
        if (empty($nome) || empty($cidade)) {
            throw new Exception("Nome e cidade são obrigatórios!");
        }
        $clube = new Clube($nome, $cidade);
        return $this->repository->salvar($clube);
    }

    public function listarClubes() {
        return $this->repository->listar();
    }

    public function buscarClube($id) {
        return $this->repository->buscarPorId($id);
    }

    public function atualizarClube($id, $nome, $cidade) {
        $clube = new Clube($nome, $cidade, $id);
        return $this->repository->atualizar($clube);
    }

    public function deletarClube($id) {
        return $this->repository->deletar($id);
    }
}
