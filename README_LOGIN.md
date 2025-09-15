# Login para Sistema Padel (PHP)

Este pacote adiciona **Login/Logout** ao seu projeto, aplicando **pelo menos 3 princípios**:

- **SRP (Single Responsibility Principle)**: cada classe tem uma responsabilidade única (`AuthService`, `MySQLUserRepository`, `BcryptHasher`, `MySQLiConnection`, `User`).
- **DIP (Dependency Inversion Principle)**: o serviço de autenticação depende de **interfaces** (`UserRepository`, `PasswordHasher`, `DatabaseConnectionInterface`) e não de implementações concretas.
- **OCP (Open/Closed Principle)**: é possível trocar o algoritmo de hash (por exemplo, Argon2) ou a fonte de dados (por exemplo, Postgres) **sem alterar** o código de alto nível — basta implementar as interfaces.

## Estrutura adicionada

```
src/
  Core/
    DatabaseConnectionInterface.php
  Domain/
    User.php
    UserRepository.php
    PasswordHasher.php
  Application/
    AuthService.php
  Infrastructure/
    MySQLiConnection.php
    MySQLUserRepository.php
    BcryptHasher.php
login.php
loginController.php
logout.php
auth_required.php
header_auth.php
users.sql
```

## Passos para usar

1. **Criar a tabela de usuários** no mesmo banco (`app_padel`) usando o arquivo `users.sql`.
2. (Opcional) Gerar um hash Bcrypt para sua senha no PHP:
   ```php
   echo password_hash('minhaSenhaForte', PASSWORD_BCRYPT);
   ```
   e atualizar o `INSERT` do `users.sql`.
3. **Acessar** `login.php` para entrar.
4. Para **proteger uma página**, adicione **no topo** do arquivo PHP:
   ```php
   require_once __DIR__ . '/auth_required.php';
   require_once __DIR__ . '/header_auth.php'; // substitui o header antigo
   ```
   E no fim do arquivo, feche os containers/HTML conforme adequado.
5. Para mostrar o estado (Usuário logado / Sair), use `header_auth.php` no lugar do `layout/header.php`.

## Notas

- O controlador de login (`loginController.php`) faz a **injeção de dependências** manualmente (composition root), conectando `AuthService` às implementações concretas.
- Para trocar o hash para **Argon2**, crie `Argon2Hasher` que implementa `PasswordHasher` e injete no login.
- Para usar outra **fonte de dados**, implemente `UserRepository` e injete no `AuthService`.
