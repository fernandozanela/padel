<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: login.php');
  exit;
}
// Se o usuário está logado, carregue a home existente (index.html) ou mostre um dashboard.
// Aqui, por padrão, tentamos incluir o index.html existente.
if (file_exists(__DIR__ . '/index.html')) {
  readfile(__DIR__ . '/index.html');
} else {
  // Fallback simples
  echo "<!DOCTYPE html><html lang='pt-br'><head><meta charset='UTF-8'><title>Home</title></head><body>";
  echo "<h1>Bem-vindo!</h1>";
  echo "<p>Você está logado como " . htmlspecialchars($_SESSION['user']['name']) . ".</p>";
  echo "<p><a href='logout.php'>Sair</a></p>";
  echo "</body></html>";
}
