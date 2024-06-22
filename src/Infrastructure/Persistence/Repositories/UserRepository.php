<?php

namespace App\Infrastructure\Persistence\Repositories;

use App\Domain\Entities\User;
use App\Domain\Repositories\UserRepositoryInterface;
use PDO;

class UserRepository implements UserRepositoryInterface
{
    private PDO $pdo;
    private string $table = 'app_users';

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function all()
    {
    }
    public function findById()
    {
    }
    public function create(User $user): bool
    {
        $stmt = $this->pdo->prepare("INSERT INTO {$this->table} (name, email, password) VALUES (:name, :email, :password)");
        $stmt->bindParam(':name', $user->getName(), PDO::PARAM_STR);
        $stmt->bindParam(':email', $user->getEmail(), PDO::PARAM_STR);
        $stmt->bindParam(':password', $user->getPassword(), PDO::PARAM_STR);
        return $stmt->execute();
    }
    public function update()
    {
    }
    public function delete()
    {
    }
}
