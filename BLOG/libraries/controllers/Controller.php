<?php
namespace Controllers;
require_once 'libraries/models/Comment.php';
require_once 'libraries/utils.php';
require_once 'libraries/models/Article.php';

abstract class Controller {
    protected $model;
    protected $modelName;

        public function __construct() {
        $this->model = new $this->modelName;
    }
}