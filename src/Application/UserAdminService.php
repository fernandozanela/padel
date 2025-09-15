<?php
namespace Application;

use Domain\UserAdminRepository;
use Domain\PasswordHasher;

class UserAdminService {
    private UserAdminRepository $repo;
    private PasswordHasher $hasher;

    public function __construct(UserAdminRepository $repo, PasswordHasher $hasher) {
        $this->repo = $repo;
        $this->hasher = $hasher;
    }

    public function create(string $nome, string $email, string $senha, string $role): int {
        $hash = $this->hasher->hash($senha);
        return $this->repo->create($nome, $email, $hash, $role);
    }

    public function update(int $id, string $nome, string $email, ?string $senha, string $role): void {
        $hash = $senha !== null && $senha !== '' ? $this->hasher->hash($senha) : null;
        $this->repo->update($id, $nome, $email, $hash, $role);
    }
}
