<?php

namespace MVC_TRAINING\Models\Student;

use MVC_TRAINING\Core\ResourceModel;
use MVC_TRAINING\Models\Student\StudentModel;

class StudentResourceModel extends ResourceModel
{
    public function __construct()
    {
        $this->_init('students', 'studentId', new StudentModel());
    }
}

?>