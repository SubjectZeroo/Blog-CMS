
<?php require_once  '../config/app.php'; ?>
<?php
require_once("../model/users/users.model.php");

$user = new User();

if(isset($_GET['delete'])){
$user->setUser_id($_GET["delete"] );
$result = $user->deleteUser();


  if ($result == "exito")
    {
        echo "<script type='text/javascript'>
          alert('Se ha actualizado el post correctamente');
          window.location.href = '../admin/users.php';
        </script>";
    }
    else
    {
        echo "<script type='text/javascript'>
          alert('Ha ocurrido un error, por favor intente nuevamente');
          window.location.href = '../admin/users.php';
        </script>";
    }

}

?>
