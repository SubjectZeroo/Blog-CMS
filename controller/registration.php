<?php require_once  '../config/app.php'; ?>
<?php

require_once("../model/users/users.model.php");

$user = new User();
if(isset($_POST['register'])){
      $user_password = $_POST['user_password'];
      $user_password = password_hash( $user_password, PASSWORD_BCRYPT, array('cost' => 12));  
      $username = $user->setusername($_POST['username']);
      $email = $user->setuser_email($_POST['user_email']);
      $user_password = $user->setuser_password($user_password);
      $result=  $user->registerUser();
    
}

?>