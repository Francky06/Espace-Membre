<?php

namespace Router;

use Database\DBConnection;




class Route {

    public $path;
    public $routes;
    public $matches;


    public function __construct ($path, $action) {
        $this->path = trim($path, '/');
        $this->action = trim($action, '/');
    }

    public function matches(string $url) {
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        $pathToMatch = "#^$path$#";

        if(preg_match($pathToMatch, $url, $matches)) {
            $this->matches = $matches;
            return true;
        } else {
            return false;
        }
    }


    public function execute() {
        $params = explode('@', $this->action);
        $controller = new $params[0]( new DBConnection('myapp', 'localhost', 'root', ''));
        $method = $params[1];

        if(isset($this->matches[1])) {
            $controller->$method($this->matches[1]);
        } else {
            $controller->$method();
        }  

    }


    }

