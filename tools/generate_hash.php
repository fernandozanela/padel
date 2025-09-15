<?php
// tools/generate_hash.php
// Gere um hash Bcrypt para uma senha: /tools/generate_hash.php?senha=minhaSenha
$senha = $_GET['senha'] ?? null;
if (!$senha) {
    echo "Passe ?senha=... na URL.";
    exit;
}
echo password_hash($senha, PASSWORD_BCRYPT);
