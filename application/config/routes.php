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
  'post' => [
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
  'admin/add' => [
    'controller' => 'admin',
    'action' => 'add',
  ],
  'admin/edit' => [
    'controller' => 'admin',
    'action' => 'edit',
  ],
  'admin/delete' => [
    'controller' => 'admin',
    'action' => 'delete',
  ],
];
