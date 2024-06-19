<?php

declare(strict_types=1);

namespace App\Infrastructure\Database;

use Exception;
use PDO;

class DatabaseFactory
{
    public static function create(array $config): PDO
    {
        $dsn = self::createDsn($config['database']);

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            return new PDO($dsn, $config['database']['user'], $config['database']['pass'], $options);
        } catch (\PDOException $e) {
            throw new Exception("Erro ao conectar ao banco de dados: " . $e->getMessage());
        }
    }

    private static function createDsn(array $database): string
    {
        $driver = $database['driver'] ?? '';
        $dbTest = $database['test'] ?? false;

        if ($driver === 'mysql' && $dbTest === false) {
            $host = $database['host'] ?? '';
            $name = $database['name'] ?? '';
            $user = $database['user'] ?? '';
            $pass = $database['pass'] ?? '';

            if ($host && $name && $user && $pass) {
                return "mysql:host={$host};dbname={$name};charset=utf8mb4";
            } else {
                throw new \InvalidArgumentException('Cannot create DSN for MySQL: missing required parameters.');
            }
        } elseif ($driver === 'sqlite' && $dbTest === true) {
            $dbPath = __DIR__ . '/../../../' . ($database['host'] ?? '');

            if ($dbPath) {
                return "sqlite:{$dbPath}";
            } else {
                throw new \InvalidArgumentException('Cannot create DSN for SQLite: missing database path.');
            }
        } else {
            throw new \InvalidArgumentException('Cannot create DSN: invalid or missing database driver.');
        }
    }
}
