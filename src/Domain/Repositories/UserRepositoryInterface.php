<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\User;

interface UserRepositoryInterface
{
    public function all();
    public function findById();
    public function create(User $user): bool;
    public function update();
    public function delete();
}
