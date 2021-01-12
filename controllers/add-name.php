<?php 

App::get('database')->insert('users',[

  'name' => $_POST['name'],
  'username' =>  $_POST['username'],


]);

// var_dump($_POST);
  // require('views/add-names.php');