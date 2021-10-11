<?php
namespace MVC_TRAINING;

class  Request
{
    public $url;

    public function __construct()
    {
        if(isset($_GET['url'])) {
            $this->url = $_GET['url'];
        } else {
            $this->url = '/';
        }
    }
}