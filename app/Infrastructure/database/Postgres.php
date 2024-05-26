<?php

namespace App\Infrastructure\database;

class Postgres
{
    private static $conn;

    public function connect(): \PDO
    {
        $conStr = sprintf("pgsql:host=%s;port=%d;dbname=%s;user=%s;password=%s",
            env('DB_HOST', 'localhost'),
            env('DB_PORT', 5432),
            env('DB_DATABASE', 'postgres'),
            env('DB_USERNAME', 'postgres'),
            env('DB_PASSWORD', 'postgres'));

        $pdo = new \PDO($conStr);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }

    public static function get() {
        if (null === static::$conn) {
            static::$conn = new static();
        }

        return static::$conn;
    }

    protected function __construct() {

    }

    private function __clone() {

    }
}
