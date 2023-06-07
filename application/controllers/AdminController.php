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

  public function loginAction()
  {
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