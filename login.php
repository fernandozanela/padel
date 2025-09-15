<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Login - Sistema Padel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.html">Sistema Padel</a>
  </div>
</nav>

<div class="container mt-5" style="max-width: 480px;">
  <div class="card shadow-sm">
    <div class="card-body">
      <h1 class="h4 mb-3">Entrar</h1>
      <?php if (isset($_GET['erro'])): ?>
        <div class="alert alert-danger">E-mail ou senha inválidos.</div>
      <?php endif; ?>
      <form method="post" action="loginController.php" novalidate>
        <div class="mb-3">
          <label for="email" class="form-label">E-mail</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Senha</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button class="btn btn-primary w-100" type="submit">Entrar</button>
      </form>
    </div>
  </div>
  <p class="text-muted small mt-3">Dica: crie um usuário manualmente na tabela <code>users</code> usando o hash Bcrypt (ver README).</p>
</div>
</body>
</html>
