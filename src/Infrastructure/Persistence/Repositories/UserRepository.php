<?php

namespace App\Infrastructure\Persistence\Repositories;

use App\Domain\Entities\User;
use App\Domain\Repositories\UserRepositoryInterface;
use PDO;

class UserRepository implements UserRepositoryInterface
{
    private PDO $pdo;

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
        return true;
    }
    public function update()
    {
    }
    public function delete()
    {
    }
}
