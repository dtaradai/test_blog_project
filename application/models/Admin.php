<?php

namespace application\models;

use application\core\Model;

class Admin extends Model
{

  public $error;

  public function loginValidate($post)
  {
    $login = trim($post['login']);
    $password = trim($post['password']);

    if ((mb_strlen($login) > 3 && mb_strlen($login) < 25) && (mb_strlen($password) > 3 && mb_strlen($password) < 25)) {
      $admin = $this->getAdmin($login);

      if ($login === $admin['login'] && $password === $admin['password']) {
        return true;
      }
    }
    $this->error = 'Login or password entered incorrectly.';
    return false;
  }

  public function getAdmin($login)
  {
    $admin = $this->db->row("SELECT * FROM `administrators` WHERE login = '" . $login . "'");
    return $admin;
  }

  public function addPost($post)
  {
    $params = [
      'post_id' => NULL,
      'title' => $post['title'],
      'text' => $post['text']
    ];

    $this->db->query('INSERT INTO `posts` VALUES (:post_id, :title, :text)', $params);
    return $this->db->lastInsertId();
  }

  public function updatePost($post, $post_id)
  {
    $params = [
      'post_id' => $post_id,
      'title' => $post['title'],
      'text' => $post['text'],
    ];

    $this->db->query('UPDATE `posts` SET title = :title, text = :text WHERE post_id = :post_id', $params);
    return $this->db->lastInsertId();
  }

  public function postExists($post_id)
  {
    $params = [
      'post_id' => $post_id
    ];

    return $this->db->column("SELECT post_id FROM `posts` WHERE post_id = :post_id", $params);
  }

  public function getPost($post_id)
  {
    $params = [
      'post_id' => $post_id
    ];

    return $this->db->row("SELECT * FROM `posts` WHERE post_id = :post_id", $params);
  }

  public function getPosts($filter)
  {
    $params = [
      'max' => $filter['limit'],
      'start' => $filter['start'],
    ];
    return $this->db->rows("SELECT * FROM `posts` ORDER BY post_id DESC LIMIT :start, :max", $params);
  }

  public function postsCount()
  {
    return $this->db->column("SELECT COUNT(post_id) FROM `posts`");
  }

  public function deletePost($post_id)
  {
    $params = [
      'post_id' => $post_id
    ];
    $this->db->column("DELETE FROM `posts` WHERE post_id = :post_id", $params);
  }
}
