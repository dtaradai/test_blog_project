<?php 
namespace application\lib;

use PDO;

class Db {

  protected $db;

  public function __construct()
  {
    $this->db = new PDO('mysql:host='.DB_HOSTNAME.';dbname='.DB_DATABASE, DB_USERNAME , DB_PASSWORD);
  }

  public function query($sql) {
    return $this->db->query($sql);
  }

  public function rows($sql) {
    return $this->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  }

  public function column($sql) {
    return $this->query($sql)->fetchColumn();
  }
}
