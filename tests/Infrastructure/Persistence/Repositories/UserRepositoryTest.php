<?php

namespace Tests\Infrastructure\Persistence\Repositories;

use App\Domain\Entities\User;
use App\Infrastructure\Persistence\Repositories\UserRepository;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{
    public function testSaveNewUser()
    {
        $user           = new User();
        $userRepository = new UserRepository();

        $user->setUserName("wellington");
        $user->setName("wellington");
        $user->setEmail("wellington@gmail.com");
        $user->setPassword("123456");

        $create = $userRepository->create($user);

        $this->assertIsBool($create);
    }
}
