<?php

namespace MVC_TRAINING\Models\Task;

use MVC_TRAINING\Models\Task\TaskResourceModel;

class TaskRepository
{
    protected $task;

    public function __construct()
    {
        $this->task = new TaskResourceModel();
    }

    public function getAll() {
        return $this->task->getAll();
    }

    public function getId($id) {
        $model = $this->task->getId($id);
        return $model;
    }

    public function add($model) {
        $this->task->save($model);
    }

    public function delete($id) {
        $this->task->delete($id);
    }

    public function where($arr) {
        return TaskResourceModel::where($arr);
    }

    public function andWhere($arr) {
        return $this->task->andWhere($arr);
    }

    public function orderBy($col, $asc)
    {
        return $this->task->orderBy($col, $asc);
    }

    public function orWhere($arr) {
        return $this->task->orWhere($arr);
    }

    public function get() {
        return $this->task->get();
    }
}

?>