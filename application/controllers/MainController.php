<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{
  public function indexAction()
  {
    $this->view->render('Home');
  }

  public function aboutAction()
  {
    $this->view->render('About');
  }

   public function contactAction()
  {
    if (!empty($_POST)) {
      $this->view->message('success', 'form ok');
    }
    $this->view->render('Contact');
  }

   public function postAction()
  {
    $this->view->render('Post');
  }

  
}