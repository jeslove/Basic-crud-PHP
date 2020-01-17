<?php

require_once 'config.php';

class Database
{
    static public $link;

    static public function Db_conn()
    {
        try {

            static::$link  = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);

            static::$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return static::$link;

        } catch (PDOException $e) {

            echo "Connection failed: " . $e->getMessage();
        }
    }
}
