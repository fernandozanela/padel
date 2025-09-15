<?php
namespace Application;

use Domain\UserRepository;
use Domain\PasswordHasher;

class AuthService {
    private UserRepository $users;
    private PasswordHasher $hasher;

    public function __construct(UserRepository $users, PasswordHasher $hasher) {
        $this->users = $users;
        $this->hasher = $hasher;
    }

    public function authenticate(string $email, string $password): ?array {
        $user = $this->users->findByEmail($email);
        if ($user && $this->hasher->verify($password, $user->passwordHash)) {
            return ['id' => $user->id, 'name' => $user->name, 'email' => $user->email, 'role' => $user->role];
        }
        return null;
    }
}
