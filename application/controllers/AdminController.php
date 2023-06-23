<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Pagination;

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

      $post = [
        'post_id' => NULL,
        'title' => trim($_POST['title']),
        'text' => trim($_POST['text']),
        'date' => date("d.m.y")
      ];

      $post_id = $this->model->addPost($post);

      if (!$post_id) {
        $this->view->message('error', 'Request processing error');
      }

      $this->uploadFile($_FILES['img']['tmp_name'], $post_id);

      $this->view->location('admin/posts');
    }

    $data = [];
    $data['admin'] = $this->isAdmin();
    $data['action'] = HTTP_SERVER . 'admin/add/';

    $this->view->render('Add post', $data);
  }

  public function editAction()
  {
    if (!$this->model->postExists($this->route['id'])) {
      $this->view->errorCode(404);
    }

    if (!empty($_POST)) {
      if (!$this->postValidate($_POST)) {
        $this->view->message('error', $this->error);
      }

      $post = [
        'post_id' => $this->route['id'],
        'title' => trim($_POST['title']),
        'text' => trim($_POST['text']),
        'date' => date("d.m.y")
      ];

      $this->model->updatePost($post, $this->route['id']);

      if (isset($_FILES['img']['tmp_name'])) {
        $this->uploadFile($_FILES['img']['tmp_name'], $this->route['id']);
      }

      $this->view->location('admin/posts');
    }

    $data = [];
    $data['admin'] = $this->isAdmin();
    $post = $this->model->getPost($this->route['id']);

    $data['post'] = [
      'title' => htmlspecialchars($post['title'], ENT_QUOTES),
      'text' => htmlspecialchars($post['text'], ENT_QUOTES),
    ];

    $data['action'] = HTTP_SERVER . 'admin/edit/' . $post['post_id'];
    $data['delete'] = HTTP_SERVER . 'admin/delete/' . $post['post_id'];
    $this->view->render('Edit post', $data);
  }

  public function deleteAction()
  {
    if (!$this->model->postExists($this->route['id'])) {
      $this->view->errorCode(404);
    }

    $filePath = 'images/posts/' . $this->route['id'] . '.jpg';
    unlink($filePath);

    $this->model->deletePost($this->route['id']);
    $this->view->redirect('admin/posts');
  }

  public function postsAction()
  {

    $limit = LIMIT;
    $pagination = new Pagination($this->route, $this->model->postsCount(), $limit);
    $data = [];

    $filter = [
      'start' => ((isset($this->route['page']) ? $this->route['page'] : 1) - 1) * $limit,
      'limit' => $limit,
    ];

    $posts = $this->model->getPosts($filter);
    $data['admin'] = $this->isAdmin();
    $data['posts'] = [];
    foreach ($posts as $post) {
      $data['posts'][] = [
        'title' => htmlspecialchars($post['title'], ENT_QUOTES),
        'text' => htmlspecialchars($post['text'], ENT_QUOTES),
        'url' => HTTP_SERVER . 'admin/edit/' . $post['post_id'],
        'img' => HTTP_IMG . 'posts/' . $post['post_id'] . '.jpg',
      ];
    }

    $data['pagination'] = $pagination->get();
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

    if ($this->route['action'] === 'add' && empty($_FILES['img']['tmp_name'])) {
      $this->error = 'No image selected';
      return false;
    }

    return true;
  }

  public function uploadFile($path, $name)
  {
    return move_uploaded_file($path, 'images/posts/' . $name . '.jpg');
  }
}
