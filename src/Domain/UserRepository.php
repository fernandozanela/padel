<?php
namespace Domain;

interface UserRepository {
    public function findByEmail(string $email): ?User;
}
