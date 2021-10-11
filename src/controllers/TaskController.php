<?php

namespace MVC_TRAINING\Controllers;

use MVC_TRAINING\Core\Controller;
use MVC_TRAINING\Models\Task\TaskRepository;

class TaskController extends Controller
{
    public function index() {


        
        $tasks = new TaskRepository();
        echo '<pre>';
        var_dump($tasks->getAll());die;


        $d['tasks'] = $tasks->getAll();
        $this->set($d);
        $this->render("index");
    }

    public function creat() {

    }

    public function store() {

    }

    public function edit($id) {
        
    }

    public function update() {

    }

    public function delete($id) {

    }
}