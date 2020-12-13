<?php require_once  '../config/app.php'; ?>
<?php
require_once("../model/users/users.model.php");

$user = new User();

if(isset($_GET['change_to_subscriber'])){

  $user->setUser_id($_GET['change_to_subscriber']);
  

    $result = $user->updateUserToSubscriber();

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
