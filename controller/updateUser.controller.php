<?php require_once  '../config/app.php'; ?>
<?php
require_once("../model/users/users.model.php");

$user = new User();

if(isset($_GET['edit_user'])){

  $user->setUser_id($_GET['edit_user']);

  $user_password = $_POST['user_password'];
  $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));
  $user->setuser_firtsname($_POST['user_firtsname']);
  $user->setuser_lastname($_POST['user_lastname']);
  $user->setuser_email($_POST['user_email']);
  $user->setusername($_POST['username']);
  // $user->setuser_role($_POST['user_role']);
  $user_password = $user->setuser_password($user_password);

    $result = $user->updateUser();

    if ($result == "exito")
    {
        echo "<script type='text/javascript'>
          alert('The comment was unapproved');
          window.location.href = '../admin/users.php';
        </script>";
    }
    else
    {
        echo "<script type='text/javascript'>
          alert('An error has occurred, please try again');
          window.location.href = '../admin/users.php';
        </script>";
    }


}

?>
