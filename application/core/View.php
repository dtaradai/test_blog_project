<?php

namespace application\core;

class View
{
  public $path;
  public $route;
  public $layout = 'default';


  public function __construct($route)
  {
    $this->route = $route;
    $this->path = $route['controller'] . '/' . $route['action'];
  }

  public function render($title, $data = [])
  {
    extract($data);
    $path = 'application/views/' . $this->path . '.php';
    $header = 'header';
    $footer = 'footer';

    if ($this->layout === 'admin') {
     $header = 'adminHeader';
     $footer = 'adminFooter';
    }

    if (file_exists($path)) {
      require_once 'application/views/layouts/' . $header . '.php';
      require_once $path;
      require_once 'application/views/layouts/' . $footer . '.php';
    }
  }

  public static function errorCode($code)
  {
    http_response_code($code);
    $path = 'application/views/errors/' . $code . '.php';
    if (file_exists($path)) {
      require_once $path;
    }

    exit;
  }

  public function redirect($url)
  {
    header('location: ' . $url);
    exit;
  }

  public function message($status, $message = '') {
    exit(json_encode(['status' => $status, 'message' => $message]));
  }

  public function location($url) {
    exit(json_encode(['url' => $url]));
  }
}
