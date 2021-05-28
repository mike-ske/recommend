<?php

namespace Recommend\ClassFile;
require 'inc/db_config.php';

class connect {

    public static $connect;
    public static $result;
    public static $error = array();

    public static $host = DB_HOST;
    public static $user = DB_USER;
    public static $pass = DB_PASS;
    public static $db = DB_NAME;




    public static function db_connect()
    {
        self::$connect = mysqli_connect(self::$host, self::$user, self::$pass, self::$db);
        return self::$connect;
    }

    public static function isConnected()
    {
        if (self::db_connect() == false) {
            
            die('Failed to connect to database' . mysqli_errno($this->db_connect() ) );
        }
        else 
        {
            return true;
        }
    }

    public static function addError(String $key, String $value)
    {
        self::$error[$key] = $value;
    }

    // public static function error($message)
    // {
    //     foreach ($value as $key => $values) {
    //         $this->error[$key] = $values;
    //     }
    // }

}