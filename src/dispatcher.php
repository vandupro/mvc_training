<?php

namespace MVC_TRAINING;

use MVC_TRAINING\Request;
use MVC_TRAINING\Router;
use MVC_TRAINING\Controllers\ErrorController;

class Dispatcher
{
    private $request;

    function __construct()
    {
        $this->request = new Request();


        Router::parse($this->request->url, $this->request);
        // echo'<pre>';
        // var_dump($this->loadController());

        
    }

    public function loadController()
    {
        $name = $this->request->controller . "Controller";
        $nameController = 'MVC_TRAINING\\Controllers\\' .$name;

        if(!class_exists($nameController)) {
            return new ErrorController;
        }
        
        return new $nameController;   
    }
}