<?php

declare(strict_types=1);

namespace App\Infrastructure\Database;

use Exception;
use PDO;

class DatabaseFactory
{
    public static function create(array $database): PDO
    {
        $dsn = self::createDsn($database);
        $user = $database['user'] ?? '';
        $pass = $database['pass'] ?? '';

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            return new PDO($dsn, $user , $pass, $options);
        } catch (\PDOException $e) {
            throw new Exception("Erro ao conectar ao banco de dados: " . $e->getMessage());
        }
    }

    private static function createDsn(array $database): string
    {
        $driver = $database['driver'] ?? '';

        if ($driver === 'mysql') {
            return self::createDsnMysql($database);
        } elseif ($driver === 'sqlite') {
            return self::createDsnSQLite($database);
        } else {
            throw new \InvalidArgumentException('Cannot create DSN: invalid or missing database driver.');
        }
    }

    private static function createDsnMysql(array $database): string
    {
        $host = $database['host'] ?? '';
        $name = $database['name'] ?? '';

        if ($host && $name) {
            return "mysql:host={$host};dbname={$name};charset=utf8mb4";
        } else {
            throw new \InvalidArgumentException('Cannot create DSN for MySQL: missing required parameters.');
        }
    }

    private static function createDsnSQLite(array $database): string
    {
        $dbPath = __DIR__ . '/../../../' . ($database['name'] ?? '');

        if ($dbPath) {
            return "sqlite:{$dbPath}";
        } else {
            throw new \InvalidArgumentException('Cannot create DSN for SQLite: missing database path.');
        }
    }
}
