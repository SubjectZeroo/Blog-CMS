<?php 

return [
    'database' => [
      'name' => 'cms',
      'username' => 'root',
      'password' => '',
      'connection' => 'mysql:host=localhost',
      'options' => [
        PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION
      ]
    ]
  ];

