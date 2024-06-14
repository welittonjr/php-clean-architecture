<?php

declare(strict_types=1);

namespace App\Infrastructure\Framework;

use DI\Container;
use DI\ContainerBuilder;

class ContainerAdapter
{
    private $containerBuilder;

    public function __construct()
    {
        $this->containerBuilder = new ContainerBuilder();
    }

    public function loadDependencyInjection(string $path, array $files)
    {
        foreach ($files as $file) {
            $filePath = $path . '/' . $file . '.php';
            if (file_exists($filePath)) {
                $definitions = require $filePath;
                $this->containerBuilder->addDefinitions($definitions);
            } else {
                $errorMessage = "File not found: $filePath";
                error_log($errorMessage, 0);
            }
        }
    }

    public function getBuild(): Container
    {
        return $this->containerBuilder->build();
    }

}
