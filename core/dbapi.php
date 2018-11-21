<?php

class DB {

    var $pdo;
    var $config;
    private static $instance = null;

    public static function get() {
        if (self::$instance === null) {
            self::$instance = new DB();
        }

        return self::$instance;
    }

    function __construct() {
        $this->config = parse_ini_file('application.config');
        $this->connect();
    }

    private function connect() {
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $dsn = 'mysql:host=' . $this->config['host']
                . ';port=3306;charset=utf8;dbname=' . $this->config['dbase'];

        $this->pdo = new PDO($dsn, $this->config['user'], $this->config['pass'], $opt);
    }

    function getInsertId() {
        return $this->pdo->lastInsertId();
    }

    function getLastError($conn = NULL) {
        if (!is_resource($conn))
            $conn = & $this->pdo;
        return $conn->errorInfo();
    }

    /**
     * @name:  prepareDate
     * @desc:  prepares a date in the proper format for specific database types
     *         given a UNIX timestamp
     * @param: $timestamp: a UNIX timestamp
     * @param: $fieldType: the type of field to format the date for
     *         (in MySQL, you have DATE, TIME, YEAR, and DATETIME)
     */
    function prepareDate($timestamp, $fieldType = 'DATETIME') {
        $date = '';
        if (!$timestamp === false && $timestamp > 0) {
            switch ($fieldType) {
                case 'DATE' :
                    $date = date('Y-m-d', $timestamp);
                    break;
                case 'TIME' :
                    $date = date('H:i:s', $timestamp);
                    break;
                case 'YEAR' :
                    $date = date('Y', $timestamp);
                    break;
                default :
                    $date = date('Y-m-d H:i:s', $timestamp);
                    break;
            }
        }
        return $date;
    }

    function getArray($query) {
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll();
    }

    function selectPaging($table, $offset, $limit, $whereStr = null, $whereArray = null) {

        $where = $whereStr === null ? '' : $whereStr;
        $sql = "SELECT * FROM `$table` WHERE $where ";
    }

    function selectTable($table) {
        $query = "SELECT * FROM " . $table;
        return $this->getArray($query);
    }

    function selectPrepared($query, $array) {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($array);
        return $stmt->fetchAll();
    }

    function selectById($table, $id) {
        $query = "SELECT * FROM `" . $table . "` WHERE id=?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array($id));
        return $stmt->fetchAll();
    }

    function insertInto($table, $array) {
        $fields = '';
        $values = '';
        $comma = '';
        $items = array();
        foreach ($array as $key => $item) {
            $fields .= $comma . '`' . $key . '`';
            $values .= $comma . '?';
            $items[] = $item;
            $comma = ', ';
        }
        $query = 'INSERT INTO `' . $table . '` (' . $fields . ') VALUES (' . $values . ')';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($items);
    }

    function updateById($table, $array, $id) {
        $values = '';
        $comma = '';

        foreach ($array as $key => $item) {
            $values .= $comma . '`' . $key . '`' . '=?';
            $items[] = $item;
            $comma = ', ';
        }
        $query = 'UPDATE `' . $table . '` SET ' . $values . ' WHERE id=' . $id;
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($items);
    }

    function deleteById($table, $id) {
        $query = "DELETE FROM " . $table . " WHERE id=?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array($id));
    }

    function delete($table, $where) {
        
    }

}
