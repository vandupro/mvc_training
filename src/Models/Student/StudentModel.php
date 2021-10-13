<?php
namespace MVC_TRAINING\Models\Student;

use MVC_TRAINING\Core\Model;

class StudentModel extends Model
{
    private $name;
    private $gender;
    private $dob;

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function getGender() {
        return $this->gender;
    }

    public function setDob($dob) {
        $this->dob = $dob;
    }

    public function getDob() {
        return $this->dob;
    }

    public function getProperties()
    {
        return get_object_vars($this);
    }
}

?>