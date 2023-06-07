<?php

namespace application\controllers;

use application\core\Controller;

class AdminController extends Controller
{
  public function loginAction()
  {
    $this->view->render('Login');
  }

  public function aboutAction()
  {
    $this->view->render('About');
  }

   public function contactAction()
  {
    $this->view->render('Contact');
  }

   public function postAction()
  {
    $this->view->render('Post');
  }

}