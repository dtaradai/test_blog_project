<?php

use application\lib\Db;

require_once 'config.php';
require_once './application/lib/Db.php';

// Create connection
$conn = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS " . DB_DATABASE . " DEFAULT CHARSET=utf8mb4";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();

$db = new Db;

$db->query("CREATE TABLE IF NOT EXISTS `administrators` (`admin_id` INT(11) NOT NULL AUTO_INCREMENT , `login` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , `email` VARCHAR(255) NOT NULL , PRIMARY KEY (`admin_id`)) ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;");

$countAdmin = (int)$db->column("SELECT count(*) FROM `administrators`");

if ($countAdmin === 0) {
  $sql = "INSERT INTO `administrators` (`login`, `password`, `email`) VALUES ('admin', 'admin', '" . EMAIL_DEFAULT . "')";
  $db->query($sql);
}

$db->query("CREATE TABLE IF NOT EXISTS `posts` (`post_id` INT(11) NOT NULL AUTO_INCREMENT , `title` VARCHAR(400) NOT NULL , `text` TEXT , `date` VARCHAR(125) DEFAULT '' , PRIMARY KEY (`post_id`)) ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;");

$db->query("CREATE TABLE IF NOT EXISTS `users` (`user_id` INT(11) NOT NULL AUTO_INCREMENT, `name` VARCHAR(255) NOT NULL , `surname` VARCHAR(255) NOT NULL , `email` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , PRIMARY KEY (`user_id`)) ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;");

