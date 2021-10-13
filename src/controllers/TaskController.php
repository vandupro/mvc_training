<?php

namespace MVC_TRAINING\Controllers;

use MVC_TRAINING\Core\Controller;
use MVC_TRAINING\Models\Task\TaskRepository;
use MVC_TRAINING\Models\Task\TaskModel;

class TaskController extends Controller
{   
    protected $tasks;
    public function __construct()
    {
        $this->tasks = new TaskRepository();
    }
    public function index() {
        $d['tasks'] = $this->getData($this->tasks->getAll());
        $this->set($d);
        $this->render("index");
    }

    public function creat() {
        $this->render("create");
    }

    public function store() {
        
        if(isset($_POST['btn'])) {
            $data = $this->secure_form($_POST);
            $model = new TaskModel();

            if(isset($data['id'])) {
                $model = $this->tasks->getId($data['id']);
            } 
            
            $model->setTitle($data['title']);
            $model->setDesc($data['description']);

            $this->tasks->add($model);
            header("Location: " . WEBROOT . "task/index");
            
        }
    }

    public function edit($id) {
        $model = $this->tasks->getId($id);
        $d['task'] = $model->getProperties($model);

        if(!$d['task']){
            header("Location: " . WEBROOT . "task/index");
        }

        $this->set($d);
        $this->render('edit');
    }

    public function delete($id) {
        $model = $this->tasks->getId($id);

        if(!$model){
            header("Location: " . WEBROOT . "task/index");
        }

        $this->tasks->delete($id);
        header("Location: " . WEBROOT . "task/index");
    }

    public function getForName() {
        $models = $this->tasks->where(['title', 'like', '%task%'])
                                ->orderBy('id', false)                  
                                ->get();
        
        echo '<pre>';
        var_dump($this->getData($models));die;
    }
}