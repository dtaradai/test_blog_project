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

  public function addPost($post) {
    $params = [
      'post_id' => NULL,
      'title' => trim($post['title']),
      'text' => trim($post['text']),
      'img' =>''
    ];

    $this->db->query('INSERT INTO `posts` VALUES (:post_id, :title, :text, :img)', $params);
    return $this->db->lastInsertId();
  }

  public function addImgToPost($imgName, $post_id) {
    $this->db->query("UPDATE `posts` SET img = '" . $imgName . "' WHERE post_id = " . $post_id . "");
  }
}
