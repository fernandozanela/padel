<?php
require_once __DIR__ . "/../models/Clube.php";

interface ClubeRepository {
    public function salvar(Clube $clube);
    public function listar();
    public function buscarPorId($id);
    public function atualizar(Clube $clube);
    public function deletar($id);
}
