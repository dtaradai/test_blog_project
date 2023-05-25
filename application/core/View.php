<?php

namespace application\core;

class View
{
  public $path;
  public $route;
  public $layout = 'default';
  public $header = 'header';
  public $footer = 'footer';

  public function __construct($route)
  {
    $this->route = $route;
    $this->path = $route['controller'] . '/' . $route['action'];
  }

  public function render($title, $data = [])
  {
    extract($data);
    $path = 'application/views/' . $this->path . '.php';
    if (file_exists($path)) {
      require_once 'application/views/layouts/' . $this->header . '.php';
      require_once $path;
      require_once 'application/views/layouts/' . $this->footer . '.php';
    } 
  }

  public static function errorCode($code) {
    http_response_code($code);
    $path = 'application/views/errors/' . $code . '.php';
    if (file_exists($path)) {
      require_once $path;
    }
    
    exit;
  }

  public function redirect($url) {
    header('location: ' . $url);
    exit;
  }
}
