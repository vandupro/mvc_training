<?php

namespace MVC_TRAINING\Controllers;

use MVC_TRAINING\Core\Controller;
use MVC_TRAINING\Models\Student\StudentRepository;
use MVC_TRAINING\Models\Student\StudentModel;

class StudentController extends Controller
{   
    protected $students;
    public function __construct()
    {
        $this->students = new StudentRepository();
    }
    public function index() {
        $d['students'] = $this->getData($this->students->getAll());
        $this->set($d);
        $this->render("index");
    }

    public function create() {
        $this->render("create");
    }

    public function store() {
        
        if(isset($_POST['btn'])) {
            $data = $this->secure_form($_POST);
            
            if(empty($data['name']) || empty($data['dob'])) {
                if(isset($data['id'])) {
                    header("Location: " . WEBROOT . "student/edit/" . $data['id'] );die;
                } else {
                    header("Location: " . WEBROOT . "student/create");die;
                }
            }
            
            $model = new StudentModel();

            if(isset($data['id'])) {
                $model = $this->students->getId($data['id']);
            } 
            
            $model->setName($data['name']);
            $model->setGender((int)$data['gender']);
            $model->setDob($data['dob']);
            $this->students->add($model);
            header("Location: " . WEBROOT . "student/index");
            
        }
    }

    public function edit($id) {
        $model = $this->students->getId($id);
        
        $d['student'] = $model->getProperties($model);

        if(!$d['student']){
            header("Location: " . WEBROOT . "student/index");
        }

        $this->set($d);
        $this->render('edit');
    }

    public function delete($id) {
        $model = $this->students->getId($id);

        if(!$model){
            header("Location: " . WEBROOT . "student/index");
        }

        $this->students->delete($id);
        header("Location: " . WEBROOT . "student/index");
    }

    public function getForName() {
        $models = $this->students->where(['title', 'like', '%student%'])
                                ->orderBy('id', false)                  
                                ->get();
        
        echo '<pre>';
        var_dump($this->getData($models));die;
    }
}