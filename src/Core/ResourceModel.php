<?php

namespace MVC_TRAINING\Core;

use MVC_TRAINING\Config\Database;
use PDO;
use MVC_TRAINING\Core\Model;

class ResourceModel extends Model implements ResourceModelInterface
{
    private $table;
    private $id;
    private $model;

    public function _init($table, $id, $model) {
        $this->table = $table;
        $this->id = $id;
        $this->model = $model;
    }
    
    public function getAll() {
        $sql = "SELECT * FROM " . $this->table;
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return ($req->fetchAll(PDO::FETCH_CLASS, get_class($this->model)));
    }

    public function getId($id) {
        $sql = "SELECT * FROM $this->table WHERE $this->id = $id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return ($req->fetchObject(get_class($this->model)));
    }

    public function execute() {
        $stmt = Database::getBdd()->prepare($this->queryBuilder);
        return $stmt->execute();
    }

    public function delete($id) {
        $model = new static();
        $model->queryBuilder = "DELETE FROM $this->table WHERE $this->id = $id";
        return $model->execute();
    }

    public static function where($arr)
    {
        $model = new static();
        $model->queryBuilder = "select * from $model->table where $arr[0] $arr[1] '$arr[2]'";
        return $model;
    }

    public function andWhere($arr)
    {
        $this->queryBuilder .= " and $arr[0] $arr[1] '$arr[2]'";
        return $this;
    }

    public function orWhere($arr)
    {
        $this->queryBuilder .= " or $arr[0] $arr[1] '$arr[2]'";
        return $this;
    }

    public function orderBy($col, $asc = true)
    {
        $this->queryBuilder .= " ORDER BY $col";
        $this->queryBuilder .= $asc == true ? " asc " : " desc ";
        return $this;
    }

    public function get()
    {   
        $stmt = Database::getBdd()->prepare($this->queryBuilder);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($this->model));
        return $result;
    }

    public function save($model) {
        $arrayModel = $model->getProperties();
        $id = isset($arrayModel[$this->id]) ? $arrayModel[$this->id] : null;
        $keyModel = array_keys($arrayModel);
        $arr = [];

        foreach($keyModel as $key => $value) {
            $value = $value . ' = :' . $value;
            $arr[] = $value;
        }
        
        $stringModel = implode(', ', $arr);

        if($id == null) {
            $sql = "INSERT INTO $this->table SET $stringModel";
        } else {
            $sql = "UPDATE $this->table SET $stringModel WHERE $this->id = $id";
        }
        $req = Database::getBdd()->prepare($sql);
        return $req->execute($arrayModel);
    }
}

?>