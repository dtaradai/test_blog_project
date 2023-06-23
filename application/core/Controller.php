<?php 

namespace application\core;
use application\core\View;

abstract class Controller {
  public $route;
  public $view;
  public $model;
  public $acl;

  public function __construct($route)
  {
    $this->route = $route;
    if (!$this->checkACL()) {
      View::errorCode(403);
    }
    $this->view = new View($route);
    $this->model = $this->loadModel($route['controller']);
  }

  public function loadModel($name) {
    $path = 'application\models\\' . ucfirst($name);
    if (class_exists($path)) {
      return new $path;
    }
  }

  public function checkACL() {
    $this->acl = require_once 'application/acl/' . $this->route['controller'] . '.php';
    if ($this->isACL('all')) {
      return true;
    } elseif (isset($_SESSION['authorize']['user_id']) && $this->isACL('authorize')) {
      return true;
    } elseif (!isset($_SESSION['authorize']['user_id']) && $this->isACL('guest')) {
      return true;
    } elseif (isset($_SESSION['admin']) && $this->isACL('admin')) {
      return true;
    }

    return false;
  }

  public function isACL($group) {
    return in_array($this->route['action'], $this->acl[$group]);
  }
}
