<?php
namespace MVC_TRAINING\Models\Task;

use MVC_TRAINING\Models\Task\TaskResourceModel;
use MVC_TRAINING\Models\Task\TaskModel;

class TaskRepository
{
    protected $task;

    public function __construct()
    {
        $this->task = new TaskResourceModel();
        
    }

    public function getAll() {
        //return $this->task->getAll();
        $arr = [];
        foreach($this->task->getAll() as $key => $value) {
            $arr[] = $value->getProperties($value);
        }
        return $arr;
    }

    public function getId($id) {
        $model = $this->task->get($id);
        return $model->getProperties($model);
    }

    public function add($model) {
        $this->task->save($model);
    }

    public function delete($id) {
        $this->task->delete($id);
    }
}

?>