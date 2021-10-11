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

    public function get($id) {
        $sql = "SELECT * FROM $this->table WHERE $this->id = $id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return ($req->fetchObject(get_class($this->model)));
    }

    public function delete($id) {
        $sql = "DELETE * FROM $this->table WHERE $this->id = $id";
        $req = Database::getBdd()->prepare($sql);
        return $req->execute();
    }

    public function save($model) {
        $arrayModel = get_object_vars($model);
        $id = $arrayModel[$this->id];
        // $arrayModel = [
        //     'id'=>'null',
        //     'title'=>'This is title',
        //     'name'=>'This is name',
        // ];

        $keyModel = array_keys($arrayModel);
        $arr = [];

        foreach($keyModel as $key => $value) {
            $value = $value . ' = :' . $value;
            $arr[] = $value;
        }
        
        $stringModel = implode(',', $arr);

        if($arrayModel[$this->id] == null) {
            $sql = "INSERT INTO $this->table SET $stringModel";
        } else {
            $sql = "UPDATE INTO $this->table SET $stringModel WHER $this->id = $id";
        }

        $req = Database::getBdd()->prepare($sql);
        return $req->execute($arrayModel);

        // echo '<pre>';
        // var_dump($stringModel);
    }

    
}

?>