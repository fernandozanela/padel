<?php
require_once "_conexao.php";
require_once "repositories/MySQLClubeRepository.php";
require_once "services/ClubeService.php";

if (isset($_GET['id'])) {
    $repository = new MySQLClubeRepository($conn);
    $service = new ClubeService($repository);

    $service->deletarClube($_GET['id']);
    header('Location: clubeSelect.php?msg=deleted');
    exit;
}