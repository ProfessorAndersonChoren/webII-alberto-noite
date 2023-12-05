<?php

namespace QI\SistemaDeChamados\Model\Repository;

use \PDO;

class Connection
{
    private static $connection;

    private function __construct()
    {
    }

    public static function getConnection()
    {
        if (self::$connection == null) {
            self::$connection = new PDO(DSN, USER, PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }
        return self::$connection;
    }
}
