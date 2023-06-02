<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller
{
  public function loginAction()
  {
    if (!empty($_POST)) {
      $response = array('success' => true, 'message' => 'ok');
      echo json_encode($response);
    } else {
      $this->view->render('Page login');
    }
  }

  public function registerAction()
  {
    if (!empty($_POST)) {
      $response = array('success' => true, 'message' => 'ok');
      echo json_encode($response);
    } else {
      $this->view->render('Page register');
    }
  }
}
