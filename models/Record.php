<?php
namespace app\models;

use app\interfaces\IRecord;
use app\services\Db;

abstract class Record implements IRecord
{
    protected $id;
    protected $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public static function getById(int $id): IRecord
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryObject(get_called_class(), $sql, [':id' => $id])[0];
    }

    public static function getALl()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

    public function getOne()
    {
        return $this->getALl()[0];
    }


    protected function push(string $tableName, array $params = []) {

        $params = [];
        $columns = [];

        foreach ($this as $key => $value) {
            if(in_array($key,['db', 'tableName'])) {
                continue;
            }

            $params[":{$key}"] = $value;
            $columns[] = "`{$key}`";
        }
        $columns = implode(", ", $columns);
        $placeholders = implode(", ", array_keys($params));

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$placeholders})";
        $this->db->execute($sql, $params);
        $newId = (int) $this->db->getLastInsertId();
        $this->id = $newId;
        return true;
    }

    protected function update(string $tableName, array $element = [], array $params = []) {
        //получить товар по id, сравнить все параметры, если отличается, то задать новое значение
        foreach ($this as $key => $value) {
            if(in_array($key,['db', 'tableName'])) {
                continue;
            }elseif ($element["$key"] != $value) {
                $params[":{$key}"] = $value;
                $placeholders = implode(", ", array_keys($params));
                $sql = (string) "UPDATE {$tableName} SET {$key} = {$placeholders} WHERE id = {$element['id']}";
                $this->db->execute($sql, $params);
                unset($params);
            }
        }
        return true;
    }

    public function delete() {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = :id";
        return $this->db->execute($sql, [':id' => $this->id]);
    }


    public function save()
    {
        $tableName = static::getTableName();
        $allFromTable = self::getALl(); //все эелементы из нужной таблицы для сравнения
        foreach ($allFromTable as $element) {
            if($this->id == $element['id']) { //если есть уже такой эелемент
               if (!$res = $this->update($tableName, $element)) { //то обновляем значения
                   echo "<h1>ERROR<h1>";
               }else {
                   echo "<script>alert('Значения обновлены!')</script>";
                   return true;
               }
            }
        }//endforeach
        if (!$res = $this->push($tableName)) { //если нет такого элемента, то создаем новый
            echo "<h1>ERROR<h1>";
        }else {
            echo "<script>alert('Элемент добавлен!')</script>";
            return true;
        }
    }
}