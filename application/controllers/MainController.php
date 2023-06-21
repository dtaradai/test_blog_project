<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Mail;
use application\lib\Pagination;
use application\models\Admin;

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
    $adminModel = new Admin;
    if (!$adminModel->postExists($this->route['id'])) {
      $this->view->errorCode(404);
    }

    $data = [];
    $post = $adminModel->getPost($this->route['id']);

    $data['post'] = [
      'post_id' => $post['post_id'],
      'title' => $post['title'],
      'text' => $post['text'],
      'date' => $post['date'],
      'img' => HTTP_IMG . 'posts/' . $post['post_id'] . '.jpg',
    ];

    $this->view->render('Post', $data);
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
    foreach ($posts as $post) {
      $data['posts'][] = [
        'title' => $post['title'],
        'text'  => mb_strimwidth($post['text'], 0, 200, '...'),
        'url' => HTTP_SERVER . 'post/' . $post['post_id'],
        'date' => $post['date'],
        'img' => HTTP_IMG . 'posts/' . $post['post_id'] . '.jpg',
      ];
    }
    $data['pagination'] = $pagination->get();

    $this->view->render('Posts', $data);
  }
}
