<?php

declare(strict_types=1);

use App\Domain\Repositories\UserRepositoryInterface;
use App\Infrastructure\Persistence\Repositories\UserRepository;
use Psr\Container\ContainerInterface;

return array(
    UserRepositoryInterface::class =>  function(ContainerInterface $container) {
        return new UserRepository($container->get(PDO::class));
    }
);
