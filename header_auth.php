<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema Padel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.html">Sistema Padel</a>
    <div class="d-flex align-items-center gap-2">
      <a class="btn btn-outline-light me-2" href="clubeSelect.php">Clubes</a>
      <a class="btn btn-outline-light me-2" href="jogadorSelect.php">Jogadores</a>
      <a class="btn btn-outline-light me-2" href="quadraSelect.php">Quadras</a>
      <a class="btn btn-outline-light me-2" href="reservaSelect.php">Reservas</a>
      <?php if (isset($_SESSION['user'])): ?>
        <?php if (($_SESSION['user']['role'] ?? 'user') === 'admin'): ?>
        <a class="btn btn-outline-warning me-2" href="admin_users.php">Usuários</a>
        <?php endif; ?>
        <span class="text-light small">Olá, <?php echo htmlspecialchars($_SESSION['user']['name']); ?></span>
        <a class="btn btn-warning btn-sm" href="logout.php">Sair</a>
      <?php else: ?>
        <a class="btn btn-success btn-sm" href="login.php">Entrar</a>
      <?php endif; ?>
    </div>
  </div>
</nav>
<div class="container mt-4">
