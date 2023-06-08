<?php

namespace application\controllers;

use application\core\Controller;
use application\core\Mail;

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
      if (!$this->model->contactValidate($_POST)) {
        $this->view->message('error', $this->model->error);
      }

      Mail::sendMessage(trim($_POST['email']), EMAIL_DEFAULT, trim($_POST['message']), $_POST['subject']);
      $this->view->message('success', 'Letter sent.');
    }
    $this->view->render('Contact');
  }

   public function postAction()
  {
    $this->view->render('Post');
  }

  
}