<?php
 session_start();
 if(isset($_POST['login'])) {
    
    $username= $_POST['username'];
    $password= $_POST['password'];

    $query = App::get('database')->getUserByUsername($username);
    while($row =  $query->fetch(PDO::FETCH_ASSOC)) {
          
        $db_id = $row['id'];
        $db_username = $row['username'];
        $db_password = $row['user_password'];
        $db_firstname = $row['user_firtsname'];
        $db_lastname = $row['user_lastname'];
        $db_role = $row['user_role'];
      
      }
      // $password = crypt($password,   $db_password);
  
      if(password_verify($password,  $db_password)) {
        $_SESSION['id'] =  $db_id;
        $_SESSION['username'] =  $db_username;
        $_SESSION['user_firtsname'] =  $db_firstname;
        $_SESSION['user_lastname'] =  $db_lastname;
        $_SESSION['user_role'] =  $db_role;
  
 
        header("Location: /panel");
      } else {
        header("Location: /");
      }
    } else {
    header("Location: /");
}

?>