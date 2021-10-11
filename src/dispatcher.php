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
        $controller = $this->loadController();

        if(!method_exists($controller, $this->request->action)) {
            //$controller = new ErrorController();
            $this->request->action = 'index';
        }
        
        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    public function loadController()
    {
        $name = $this->request->controller . "Controller";
        $nameController = 'MVC_TRAINING\\Controllers\\' .$name;

        if(!class_exists($nameController)) {
            $nameController = 'MVC_TRAINING\\Controllers\\' . 'ErrorController';
        }
        
        return new $nameController;   
    }
}