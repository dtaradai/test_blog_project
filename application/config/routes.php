<?php
return [
  //MainController
  '' => [
    'controller' => 'main',
    'action' => 'index',
  ],
  'about' => [
    'controller' => 'main',
    'action' => 'about',
  ],
  'contact' => [
    'controller' => 'main',
    'action' => 'contact',
  ],
  'post/{id:\d+}' => [
    'controller' => 'main',
    'action' => 'post',
  ],
  
  //AccountController
  'account/login' => [
    'controller' => 'account',
    'action' => 'login',
  ],
  'account/register' => [
    'controller' => 'account',
    'action' => 'register',
  ],

  //AdminController
  'admin' => [
    'controller' => 'admin',
    'action' => 'login',
  ],
  'admin/index' => [
    'controller' => 'admin',
    'action' => 'index',
  ],
  'admin/logout' => [
    'controller' => 'admin',
    'action' => 'logout',
  ],
  'admin/posts' => [
    'controller' => 'admin',
    'action' => 'posts',
  ],
  'admin/add' => [
    'controller' => 'admin',
    'action' => 'add',
  ],
  'admin/edit/{id:\d+}' => [
    'controller' => 'admin',
    'action' => 'edit',
  ],
  'admin/delete/{id:\d+}' => [
    'controller' => 'admin',
    'action' => 'delete',
  ],
];
