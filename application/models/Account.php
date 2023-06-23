<?php

namespace application\models;

use application\core\Model;

class Account extends Model
{

  public function checkEmailExists($email)
  {
    $params = [
      'email' => $email,
    ];
    return $this->db->column('SELECT user_id FROM users WHERE email = :email', $params);
  }

  public function register($post)
  {

    $params = [
      'user_id' => NULL,
      'name' => $post['name'],
      'surname' => $post['surname'],
      'email' => $post['email'],
      'password' => password_hash($post['password'], PASSWORD_BCRYPT),
    ];
    $this->db->query('INSERT INTO users VALUES (:user_id, :name, :surname, :email, :password)', $params);
  }

  public function checkEmailPassword($email, $password)
  {
    $params = [
      'email' => $email,
    ];
    $hash = $this->db->column('SELECT password FROM users WHERE email = :email', $params);
    if (!$hash || !password_verify($password, $hash)) {
      return false;
    }

    return true;
  }

  public function getUser($email)
  {
    $params = [
      'email' => $email
    ];

    return $this->db->row("SELECT * FROM users WHERE email = :email", $params);
  }

  public function updateUser($post)
  {
    $params = [
      'user_id' => $_SESSION['authorize']['user_id'],
      'name' => $post['name'],
      'surname' => $post['surname'],
      'email' => $post['email'],
    ];
    if (!empty($post['password'])) {
      $params['password'] = password_hash($post['password'], PASSWORD_BCRYPT);
      $sql = ',password = :password';
    } else {
      $sql = '';
    }

    $this->db->query('UPDATE users SET name = :name, surname = :surname, email = :email' . $sql . ' WHERE user_id = :user_id', $params);

    foreach ($params as $key => $val) {
      $_SESSION['authorize'][$key] = $val;
    }
  }
}
