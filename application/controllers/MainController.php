<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{
  public function indexAction()
  {
    $data['users'] = $this->model->getUsers();

    $this->view->render('Page Home', $data);
  }
}