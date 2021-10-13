<?php

namespace MVC_TRAINING;

class Router
{
    public static function parse($url, $request)
    {
        $url = trim($url);
        $request->controller = "task";
        $request->action = "index";
        $request->params = [];
        $explode_url = explode('/', $url);
        if($url != '/') {
            $request->controller = $explode_url[0];

            if(isset($explode_url[1])) {
                $request->action = $explode_url[1];
            }

            if(!empty($explode_url[2])) {
                $request->params = array_slice($explode_url, 2);
            }
        }
    }
}