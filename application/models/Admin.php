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
}
