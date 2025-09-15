<?php
require_once "_conexao.php";
require_once "repositories/MySQLClubeRepository.php";
require_once "services/ClubeService.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $repository = new MySQLClubeRepository($conn);
    $service = new ClubeService($repository);

    try {
        $service->cadastrarClube($_POST['nome'], $_POST['cidade']);
        header('Location: clubeSelect.php?msg=created');
        exit;
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}