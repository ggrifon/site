<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 11.04.2017
 * Time: 18:23
 */
class DB
{

    private static $config;

    private static $mysql;

    private static $instance;


    /**
     * Возвращает обьект PDO (соединение с бд)
     *
     * @return PDO
     */
    public static function mysql()
    {

        $host = self::$config['HOST'];
        $db   = self::$config['DATABASE'];
        $user = self::$config['USER'];
        $pass = self::$config['PASSWORD'];
        $charset = self::$config['CHARSET'];

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        return new PDO($dsn, $user, $pass, $opt);
    }

    /**
     * Возвращает экземпляр себя
     *
     * @return self
     */
    public static function getInstance()
    {
        if (!(self::$instance instanceof self)) {
            self::$config = require_once './config.php';
            self::$mysql = self::mysql();
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Клонирование запрещено
     */
    private function __clone()
    {
    }

    /**
     * Сериализация запрещена
     */
    private function __sleep()
    {
    }

    /**
     * Десериализация запрещена
     */
    private function __wakeup()
    {
    }
}