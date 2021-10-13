<?php

namespace MVC_TRAINING\Models\Student;

use MVC_TRAINING\Models\Student\StudentResourceModel;

class StudentRepository
{
    protected StudentResourceModel $student;

    public function __construct()
    {
        $this->student = new StudentResourceModel();
    }

    public function getAll() {
        return $this->student->getAll();
    }

    public function getId($id) {
        $model = $this->student->getId($id);
        return $model;
    }

    public function add( StudentModel $model) {
        $this->student->save($model);
    }

    public function delete($id) {
        $this->student->delete($id);
    }

    public function where($arr) {
        return StudentResourceModel::where($arr);
    }

    public function andWhere($arr) {
        return $this->student->andWhere($arr);
    }

    public function orderBy($col, $asc)
    {
        return $this->student->orderBy($col, $asc);
    }

    public function orWhere($arr) {
        return $this->student->orWhere($arr);
    }

    public function get() {
        return $this->student->get();
    }
}

?>