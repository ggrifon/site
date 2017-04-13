<?php




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
        $this->config = require_once './config.php';
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

    /**
     * Обновляет данные записи
     *
     * Принимает массив
     * Первый элемент должен быть id записи в БД
     *
     * @param $data
     * @throws \Exception
     */
    public function update($data)
    {
        if (! is_array($data)) throw new \Exception('Агрумент должен быть массивом');

        /*
         * Вырезаем id чтобы по нему обновлять запись
         * И отрезаем его, чтобы он не попал в UPDATE SET
         */
        $id = array_shift($data);
        $pdoSet = $this->pdoSet($data);
        $sql = 'UPDATE '. $this->table . ' SET '. $pdoSet .' WHERE id='. $id;
        $stmt = $this->mysql->prepare($sql);
        $stmt->execute($data);
    }

    /**
     * Формирует шаблон для SQL
     *
     * В виде: column1=:column1, column2=:column2
     *
     * @param $data
     * @return string
     * @throws \Exception
     */
    private function pdoSet($data)
    {
        if (! is_array($data)) throw new \Exception('Агрумент должен быть массивом');

        $dataInRow = '';
        foreach ($data as $key => $value) {
            $dataInRow .= $key . '=:' . $key . ', ';
        }
        // Отрезаем последние 2 символа ', '

        $dataInRow = substr($dataInRow, 0 , strlen($dataInRow) - 2);
        return $dataInRow;
    }
}