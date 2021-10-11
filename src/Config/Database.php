<?php
namespace MVC_TRAINING\Config;

use PDO;

class Database
{
    private static $bdd = null;

    public static function getBdd() {
        if(is_null(self::$bdd)) {
            self::$bdd = new PDO("mysql:host=localhost;dbname=be_traning", 'root', '');
        }
        return self::$bdd;
    }
}

?>