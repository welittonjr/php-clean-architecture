<?php

declare(strict_types=1);

namespace App\Infrastructure\Framework\Interfaces;

interface IApp
{
    public function loadRoutes(string $path, string $file);
    public function loadMiddlewares(string $path, string $file);
}
