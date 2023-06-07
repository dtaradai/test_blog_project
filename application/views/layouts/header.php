<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Productly</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href= "<?php echo DIR_CSS ?>reset.css">
  <link rel="stylesheet" href="<?php echo DIR_CSS ?>slick.css">
  <link rel="stylesheet" href="<?php echo DIR_CSS ?>jquery.fancybox.css">
  <link rel="stylesheet" href="<?php echo DIR_CSS ?>style.css">
  <link rel="stylesheet" href="<?php echo DIR_CSS ?>media.css">
</head>

<body>

  <header class="header">
    <div class="container">
      <div class="header__inner">

        <a class="logo" href="<?php echo HTTP_SERVER ?>">
          <img class="logo__img" src="<?php echo DIR_IMAGES ?>logo.png" alt="logo">
        </a>

        <nav class="menu">
          <div class="menu__btn">
            <span></span>
          </div>

          <ul class="menu__list">
            <li class="menu__list-item">
              <a class="menu__list-link" href="/">Main</a>
            </li>
            <li class="menu__list-item">
              <a class="menu__list-link" href="contact">Contact</a>
            </li>
            <li class="menu__list-item">
              <a class="menu__list-link" href="about">About</a>
            </li>
            <li class="menu__list-item">
              <a class="menu__list-link" href="post">Blog</a>
            </li>
          </ul>
        </nav>

        <div class="user-nav">
          <a class="user-nav__link signIn" href="<?php echo HTTP_SERVER ?>account/login">Sign In</a>
          <a class="user-nav__link signUp" href="<?php echo HTTP_SERVER ?>account/register">Sign Up</a>
        </div>

      </div>
    </div>
  </header>