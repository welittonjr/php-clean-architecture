<?php

namespace App\Infrastructure\Persistence\Repositories;

use App\Domain\Entities\User;
use App\Domain\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
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
