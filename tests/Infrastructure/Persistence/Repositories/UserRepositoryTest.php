<?php

namespace Tests\Infrastructure\Persistence\Repositories;

use App\Domain\Entities\User;
use App\Infrastructure\Database\DatabaseFactory;
use App\Infrastructure\Persistence\Repositories\UserRepository;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{
    public function testSaveNewUser()
    {
        $app = $this->getApp();
        $container = $app->getContainer();
        $config = $container->get('config');

        $pdo = DatabaseFactory::create($config['database_test']);

        $user           = new User();
        $userRepository = new UserRepository($pdo);

        $user->setName("wellington")
        ->setEmail("wellington@gmail.com")
        ->setPassword("123456");

        $result = $userRepository->create($user);

        $this->assertIsBool($result);
    }
}
