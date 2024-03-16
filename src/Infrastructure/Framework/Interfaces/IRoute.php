<?php

declare(strict_types=1);

namespace App\Infrastructure\Framework\Interfaces;

interface IRoute
{
    public function get(string $pattern, $callable);
    public function post(string $pattern, $callable);
    public function put(string $pattern, $callable);
    public function delete(string $pattern, $callable);
    public function options(string $pattern, $callable);
    public function group(string $pattern, $callable);
}
