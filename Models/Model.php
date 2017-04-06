<?php

namespace Models;


use PDO;

class Model
{
    // Конфиг БД
    protected $config;

    // Обьект соединения с БД при помощи PDO
    protected $mysql;

    // Используемая таблица
    protected $table;

    /**
     * Загружает конфиг
     *
     * Model constructor.
     */
    public function __construct()
    {
        $this->config = [
            'HOST' => '127.0.0.1',
            'DATABASE' => 'test_site',
            'USER' => 'root',
            'PASSWORD' => '',
            'CHARSET' => 'utf8',
        ];
        $this->mysql = $this->mysql();
    }

    /**
     * Возвращает обьект PDO (соединение с бд)
     *
     * @return PDO
     */
    protected function mysql()
    {
        $host = $this->config['HOST'];
        $db   = $this->config['DATABASE'];
        $user = $this->config['USER'];
        $pass = $this->config['PASSWORD'];
        $charset = $this->config['CHARSET'];

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        return new PDO($dsn, $user, $pass, $opt);
    }

    /**
     * Получаем одну строку данных по ID
     *
     * @param $id
     * @return array
     */
    public function getById($id)
    {
        $stmt = $this->mysql->prepare('SELECT * FROM '. $this->table .' WHERE `id`=?');
        $stmt->execute(array($id));
        return $stmt->fetch();
    }

    public function getUpdate($id)
    {
        $stmt = $this->mysql->prepare('UPDATE id SET'. $this->table .' WHERE `id`=?');
        $stmt->execute(array($id));
        return $stmt->fetch();
    }
    public function addId($id)
    {
        $stmt = $this->mysql->prepare('INSERT INTO id VALUES($id)');
        $stmt->execute(array($id));
        return $stmt->fetch();
    }
}