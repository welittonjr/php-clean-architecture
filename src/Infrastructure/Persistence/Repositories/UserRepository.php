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

    public function all(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById(int $id): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }

    public function create(User $user): bool
    {
        $stmt = $this->pdo->prepare("INSERT INTO {$this->table} (name, email, password) VALUES (:name, :email, :password)");
        $stmt->bindParam(':name', $user->getName(), PDO::PARAM_STR);
        $stmt->bindParam(':email', $user->getEmail(), PDO::PARAM_STR);
        $stmt->bindParam(':password', $user->getPassword(), PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function update(User $user): bool
    {
        $stmt = $this->pdo->prepare("UPDATE {$this->table} SET name = :name, email = :email, password = :password WHERE id = :id");
        $stmt->bindParam(':name', $user->getName(), PDO::PARAM_STR);
        $stmt->bindParam(':email', $user->getEmail(), PDO::PARAM_STR);
        $stmt->bindParam(':password', $user->getPassword(), PDO::PARAM_STR);
        $stmt->bindParam(':id', $user->getId(), PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
