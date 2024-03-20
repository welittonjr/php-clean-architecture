<?php

declare(strict_types=1);

namespace App\Infrastructure\Framework\Adapters;

use App\Infrastructure\Framework\Interfaces\IApp;
use App\Infrastructure\Framework\Interfaces\IContainer;
use Dotenv\Dotenv;
use Slim\Factory\AppFactory;
use Slim\App;

class AppAdapter implements IApp
{
    private App $app;

    public function __construct(){}

    public function setContainer(IContainer $container)
    {
        AppFactory::setContainer($container->getBuild());
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
        $this->app->run();
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

        // develop the middleware
    }

}
