<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Productly</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=PT+Serif:400,700|Roboto:400,500&amp;subset=cyrillic" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo DIR_CSS ?>reset.css">
  <link rel="stylesheet" href="<?php echo DIR_CSS ?>adminStyle.css">
</head>

<body>
  <?php if ($admin) { ?>
    <div class="container content-inner">
      <div class="sidebar">
        <nav class="menu">
          <ul>
            <li class="menu__logo">
              <a href="<?php echo HTTP_SERVER ?>/admin">
                <img src="<?php echo DIR_IMAGES ?>logo.png" alt="logo">
              </a>
            </li>
            <li><a class="sidebar__link" href="<?php echo HTTP_SERVER ?>admin/add">Add post</a></li>
            <li><a class="sidebar__link" href="<?php echo HTTP_SERVER ?>admin/posts">Posts</a></li>
          </ul>
        </nav>
      </div>

      <div class="content">
        <div class="header">
          <div class="header__nav">
            <span class="header__link">Hello admin</span>
            <a class="header__link" href="<?php echo HTTP_SERVER ?>">Site</a>
            <a class="header__link" href="<?php echo HTTP_SERVER ?>admin/logout">Log out</a>
          </div>
        </div>
        <div class="editable-content">
        <?php } ?>