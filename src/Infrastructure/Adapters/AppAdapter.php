<?php

declare(strict_types=1);

namespace App\Infrastructure\Adapters;

use DI\Container;
use Dotenv\Dotenv;
use Slim\Factory\AppFactory;
use Slim\App;

class AppAdapter
{
    private App $app;

    public function __construct(){}

    public function setContainer(Container $container)
    {
        AppFactory::setContainer($container);
        $this->app = AppFactory::create();
    }

    public function loadFileEnv(string $path, string $fileEnv)
    {
        $filePath = $path .'/'. $fileEnv;

        if (!file_exists($filePath)) {
            $errorMessage = "File not found: $filePath";
            error_log($errorMessage, 0);
            return;
        }

        $dotenv = Dotenv::createUnsafeImmutable($path, $fileEnv);
        $dotenv->load();
    }

    public function loadRoutes(string $path, string $file)
    {
        $filePath = $path . '/' . $file . '.php';

        if (!file_exists($filePath)) {
            $errorMessage = "File not found: $filePath";
            error_log($errorMessage, 0);
            return;
        }

        $fileContent = file_get_contents($filePath);
        if (empty($fileContent)) {
            $errorMessage = "Empty file: $filePath";
            error_log($errorMessage, 0);
            return;
        }

        $router = new RouteAdapter($this->app);
        $routes = require $filePath;
        $routes($router);
    }

    public function loadMiddlewares(string $path, string $file)
    {
        $filePath = $path . '/' . $file . '.php';

        if (!file_exists($filePath)) {
            $errorMessage = "File not found: $filePath";
            error_log($errorMessage, 0);
            return;
        }

        $fileContent = file_get_contents($filePath);
        if (empty($fileContent)) {
            $errorMessage = "Empty file: $filePath";
            error_log($errorMessage, 0);
            return;
        }

        $middleware = require $filePath;
        $this->app->add($middleware);
    }

    public function getApp()
    {
        return $this->app;
    }

}
