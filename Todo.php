<?php

namespace MyApp;

class Todo {
    private $_db;

    public function __construct() {
        try {
            $this->_db = new \PDO(DSN, DB_USERNAME, DB_PASSWORD);
            $this->_db->setAttribute(\PDO::ATTR_ERROMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function getAll(){
        $stmt = $this->_db->query("select * from todos order by id desc");
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}