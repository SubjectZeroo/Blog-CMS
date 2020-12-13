<?php session_start(); ?> 

<?php 
  $_SESSION['username'] =  null;
  $_SESSION['user_firtsname'] = null;
  $_SESSION['user_lastname'] = null;
  $_SESSION['user_role'] =  null;
  header("Location: ../index.php");
?>