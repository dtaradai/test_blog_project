<?php

namespace application\controllers;

use application\core\Controller;

class AdminController extends Controller
{
  private $error;

  public function __construct($route)
  {
    parent::__construct($route);
    $this->view->layout = 'admin';
  }

  public function indexAction()
  {
    $data = [];
    $data['admin'] = $this->isAdmin();

    if (isset($_SESSION['admin'])) {
      $data['admin'] = true;
    }
    $this->view->render('Home', $data);
  }

  public function loginAction()
  {
    $data = [];
    if (isset($_SESSION['admin'])) {
      $this->view->redirect('admin/index');
    }

    if (!empty($_POST)) {
      if (!$this->model->loginValidate($_POST)) {
        $this->view->message('error', $this->model->error);
      }

      $_SESSION['admin'] = true;
      $this->view->location('admin/index');
    }

    $data['admin'] = false;
    $this->view->render('Login', $data);
  }

  public function logoutAction()
  {
    unset($_SESSION['admin']);
    $this->view->redirect('admin');
  }

  public function addAction()
  {
    if (!empty($_POST)) {
      if (!$this->postValidate($_POST)) {
        $this->view->message('error', $this->error);
      }
      $post_id = $this->model->addPost($_POST);

      if (!$post_id) {
        $this->view->message('error', 'Request processing error');
      }

      $fileName = $_FILES['img']['name'];

      if ($this->uploadFile($_FILES['img']['tmp_name'], $fileName)) {
        $this->model->addImgToPost($fileName, $post_id);
      }

      $this->view->message('success', 'id: ' . $post_id);
    }

    $data = [];
    $data['admin'] = $this->isAdmin();
    $this->view->render('Add post', $data);
  }

  public function editAction()
  {
    $data = [];
    $data['admin'] = $this->isAdmin();
    $this->view->render('Edit post', $data);
  }

  public function deleteAction()
  {
    $data = [];
    $data['admin'] = $this->isAdmin();
    $this->view->render('Delete', $data);
  }

  public function postsAction()
  {
    $data = [];
    $data['admin'] = $this->isAdmin();
    $data['posts'] = [];
    $this->view->render('Posts', $data);
  }

  private function isAdmin()
  {
    $admin = false;
    if (isset($_SESSION['admin'])) {
      $admin = true;
    }
    return $admin;
  }

  private function postValidate($post)
  {
    $title = trim($post['title']);
    $text = trim($post['text']);
    if (mb_strlen($title) < 2 || mb_strlen($title) > 255) {
      $this->error = 'The title must be between 2 and 255 characters.';
      return false;
    } elseif (mb_strlen($text) < 10 || mb_strlen($text) > 1000) {
      $this->error = 'The text must be between 10 and 1000 characters.';
      return false;
    }

    if (empty($_FILES['img']['tmp_name'])) {
      $this->error = 'No image selected';
      return false;
    }

    return true;
  }

  public function uploadFile($path, $name)
  {
    return move_uploaded_file($path, 'images/posts/' . $name);
  }
}
