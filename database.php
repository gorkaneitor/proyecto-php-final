<?php

namespace com\leartik\daw24gone\diskoak;

use PDO;

class Database
{
    private static $db = null;

    public static function getConnection()
    {
        if (self::$db === null) {
            $path = __DIR__ . '/diskoak.db';
            self::$db = new PDO("sqlite:" . $path);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$db;
    }
}
