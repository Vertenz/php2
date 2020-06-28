<?php
namespace app\models;

use app\interfaces\ModelInterface;
use app\services\Db;

abstract class Model implements ModelInterface
{
    protected $tableName;
    protected $db = null;

    public function __construct()
    {
        $this->db = Db::getInstance();
        $this->tableName = $this->getTableName();
    }

    public function getById(int $id): array
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = ?";
        $params = [$id];
        return $this->db->queryOne($sql, $params);
    }

    public function getALl()
    {
        $sql = "SELECT * FROM {$this->tableName}";
        return $this->db->queryAll($sql);
    }

    public function getOne()
    {
        return $this->getALl()[0];
    }


    public function pushItDb(array $params=[]) {
        $element = $this->getOne();
        $columnsNames = [];
        foreach ($element as $columns => $value) {
            if($columns == 'id') {
                continue;
            }else {
                array_push($columnsNames, $columns);
            }
        }
        $columnsNames = implode(', ', $columnsNames);
        $params = implode("', '", $params);
        $sql = "INSERT INTO {$this->tableName} ({$columnsNames})
                VALUES ('{$params}')";
        return $this->db->execute($sql, $empty = []);
    }

    public function delete(int $id) {
        $params = [$id];
        $sql = "DELETE FROM {$this->tableName} WHERE id = ?";
        return $this->db->execute($sql, $params);
    }
}