<?php
namespace Domain;

interface UserAdminRepository {
    /** @return User[] */
    public function findAll(): array;
    public function findById(int $id): ?User;
    public function create(string $nome, string $email, string $senhaHash, string $role): int;
    public function update(int $id, string $nome, string $email, ?string $senhaHash, string $role): void;
    public function delete(int $id): void;
}
