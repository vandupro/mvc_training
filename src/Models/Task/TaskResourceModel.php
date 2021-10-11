<?php
namespace MVC_TRAINING\Models\Task;

use MVC_TRAINING\Core\ResourceModel;
use MVC_TRAINING\Models\Task\TaskModel;

class TaskResourceModel extends ResourceModel
{
    public function __construct()
    {
        $this->_init('tasks', 'id', new TaskModel());
    }
}

?>