<?php

namespace application\models;
use application\core\Model;

class Main extends Model{

  public $error;

  public function contactValidate($post) {
    $name = trim($post['name']);
    $massage = trim($post['message']);
    if (mb_strlen($name) < 2 || mb_strlen($name) > 25) {
      $this->error = 'The name must be between 2 and 25 characters.';
      return false;
    } elseif (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
      $this->error = 'Error entering email.';
      return false;
    } elseif (mb_strlen($massage) < 3 || mb_strlen($massage) > 500) {
      $this->error = 'The text must contain from 3 to 500 characters.';
      return false;
    }
    
    return true;
  }

  public function getUsers() {
    $users = $this->db->rows('SELECT * FROM `users`');
    return $users;
  }
}