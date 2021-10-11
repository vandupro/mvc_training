<?php
namespace MVC_TRAINING\Models\Task;

use MVC_TRAINING\Core\Model;

class TaskModel extends Model
{
    private $title;
    private $description;
    private $created_at;
    private $updated_at;

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setDesc($desc) {
        $this->description = $desc;
    }

    public function getDesc() {
        return $this->description;
    }

    public function setCreated_at($created_at) {
        $this->created_at = $created_at;
    }

    public function getCreated_at() {
        return $this->created_at;
    }

    public function setUpdated_at($updated_at) {
        $this->updated_at = $updated_at;
    }

    public function getUpdated_at() {
        return $this->updated_at;
    }

    public function getProperties()
    {
        return get_object_vars($this);
    }
}

?>