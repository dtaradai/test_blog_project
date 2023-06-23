<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller
{
  private $error;

  public function loginAction()
  {
    if (!empty($_POST)) {
      $inputs = [
        'email', 'password'
      ];

      if (!$this->validate($inputs, $_POST)) {
        $this->view->message('error', $this->error);
      } elseif (!$this->model->checkEmailPassword($_POST['email'], $_POST['password'])) {
        $this->view->message('error', 'Email or password is incorrect');
      }

      $user = $this->model->getUser($_POST['email']);
      $_SESSION['authorize'] = $user;

      $this->view->location('account/profile');
    } else {
      $this->view->render('Page login');
    }
  }

  public function registerAction()
  {
    if (!empty($_POST)) {
      $inputs = [
        'name', 'surname', 'email', 'password'
      ];

      if (!$this->validate($inputs, $_POST)) {
        $this->view->message('error', $this->error);
      } elseif ($this->model->checkEmailExists($_POST['email'])) {
        $this->view->message('error', 'Email is already in use');
      } elseif ($_POST['password'] !== $_POST['confirm-password']) {
        $this->view->message('error', 'Password mismatch');
      }

      $this->model->register($_POST);
      $this->view->location('account/profile');
      $this->view->message('success', 'Registration completed');
    } else {
      $this->view->render('Page register');
    }
  }

  public function profileAction()
  {
    if (!empty($_POST)) {
      $inputs = [
        'name', 'surname', 'email'
      ];

      if (!$this->validate($inputs, $_POST)) {
        $this->view->message('error', $this->error);
      }
      $email_id = $this->model->checkEmailExists($_POST['email']);
      if ($email_id && $email_id !== $_SESSION['authorize']['user_id']) {
        $this->view->message('error', 'Email is already in use');
      }

      if (!empty($_POST['password']) && (!$this->validate(['password'], $_POST) && $_POST['password'] !== $_POST['confirm-password'])) {
        $this->view->message('error', 'Password mismatch');
      }

      $this->model->updateUser($_POST);
      $this->view->message('success', 'Data change successful!');
    }

    $data['user'] = [
      'name' => $_SESSION['authorize']['name'],
      'surname' => $_SESSION['authorize']['surname'],
      'email' => $_SESSION['authorize']['email'],
    ];

    $this->view->render('Profile', $data);
  }

  public function validate($inputs, $post)
  {
    $rules = [
      'email' => [
        'pattern' => '#^([a-z0-9_.-]{1,20}+)@([a-z0-9_.-]+)\.([a-z\.]{2,10})$#',
        'message' => 'E-mail address is incorrect',
      ],
      'name' => [
        'pattern' => '#^[a-zа-яёії]{3,15}$#iu',
        'message' => 'Name is incorrect ( letters are allowed, the name must contain from 3 to 15 characters)',
      ],
      'surname' => [
        'pattern' => '#^[a-zа-яёії]{3,15}$#iu',
        'message' => 'Surname is incorrect ( letters are allowed, the surname must contain from 3 to 15 characters)',
      ],
      'password' => [
        'pattern' => '#^[a-z0-9]{5,30}$#',
        'message' => 'Password is incorrect (only Latin letters and numbers from 10 to 30 characters are allowed',
      ],
    ];

    foreach ($inputs as $input) {
      if (!isset($post[$input]) or !preg_match($rules[$input]['pattern'], $post[$input])) {
        $this->error = $rules[$input]['message'];
        return false;
      }
    }

    return true;
  }

  public function logoutAction()
  {
    unset($_SESSION['authorize']);
    $this->view->redirect('account/login');
  }
}
