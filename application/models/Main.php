<?php

namespace application\models;
use application\core\Model;

class Main extends Model{
  public function getUsers() {
    $users = $this->db->rows('SELECT * FROM `users`');
    return $users;
  }
}