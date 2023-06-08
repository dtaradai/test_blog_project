<?php

namespace application\controllers;

use application\core\Controller;

class AdminController extends Controller
{
  public function __construct($route)
  {
    parent::__construct($route);
    $this->view->layout = 'admin';
  }

  public function indexAction()
  {
    $this->view->render('Home');
  }

  public function loginAction()
  {
    if (!empty($_POST)) {
      if (!$this->model->loginValidate($_POST)) {
        $this->view->message('error', $this->model->error);
      }

      $_SESSION['admin'] = true;
      $this->view->location('admin/index');
    }

    $this->view->render('Login');
  }

  public function logoutAction()
  {
    $this->view->render('Logout');
  }

  public function addAction()
  {
    $this->view->render('Add');
  }

  public function editAction()
  {
    $this->view->render('Edit');
  }

  public function deleteAction()
  {
    $this->view->render('Delete');
  }
}
