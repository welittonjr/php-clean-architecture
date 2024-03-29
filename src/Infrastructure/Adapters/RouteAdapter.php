<?php

declare(strict_types=1);

namespace App\Infrastructure\Adapters;

use App\Infrastructure\Interfaces\RouteInterface;
use Slim\App;

class RouteAdapter implements RouteInterface
{
    private App $app;

    public function __construct(App $app)
    {
        $this->app = $app;
    }

    public function get(string $pattern, $callable)
    {
        $this->app->get($pattern, $callable);
    }

    public function post(string $pattern, $callable)
    {
        $this->app->post($pattern, $callable);
    }

    public function put(string $pattern, $callable)
    {
        $this->app->put($pattern, $callable);
    }

    public function delete(string $pattern, $callable)
    {
        $this->app->delete($pattern, $callable);
    }

    public function options(string $pattern, $callable)
    {
        $this->app->options($pattern, $callable);
    }

    public function group(string $pattern, $callable)
    {
        $this->app->group($pattern, $callable);
    }
}
