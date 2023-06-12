<?php

namespace application\lib;

use PDO;

class Db
{

  protected $db;

  public function __construct()
  {
    $this->db = new PDO('mysql:host=' . DB_HOSTNAME . ';dbname=' . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
  }

  public function query($sql, $params = [])
  {
    $stmt = $this->db->prepare($sql);
    foreach ($params as $key => $value) {
      $stmt->bindValue(':' . $key, $value);
    }
     $stmt->execute();
     return $stmt;
  }

  public function rows($sql, $params = [])
  {
    return $this->query($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
  }

  public function row($sql, $params = [])
  {
    return $this->query($sql, $params)->fetchAll(PDO::FETCH_ASSOC)['0'];
  }

  public function column($sql, $params = [])
  {
    return $this->query($sql, $params)->fetchColumn();
  }

  public function lastInsertId() {
    return $this->db->lastInsertId();
  }
}
