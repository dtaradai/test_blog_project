<?php 
namespace application\lib;

class Mail {
  public static function sendMessage($from, $to, $message, $subject = 'the subject')
  {
    $headers = 'From: ' . $from;
    mail($to, $subject, $message, $headers);
  }
}