<?php
namespace Infrastructure;

use Domain\PasswordHasher;

class BcryptHasher implements PasswordHasher {
    public function hash(string $plain): string {
        return password_hash($plain, PASSWORD_BCRYPT);
    }
    public function verify(string $plain, string $hash): bool {
        return password_verify($plain, $hash);
    }
}
