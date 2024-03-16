<?php

declare(strict_types=1);

namespace App\Infrastructure\Framework\Interfaces;

use DI\Container;

interface IContainer
{
    public function getBuild(): Container;
}
