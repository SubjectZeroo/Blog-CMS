<?php 
//  if(isset($_POST['login'])) {
    
//   $username=$_POST['username'];
//   $password=$_POST['password'];

//   $query = App::get('database')->getUserByUsername($username);


 
//     while($query) {
//       $db_id = $row['id'];
//       $db_username = $row['username'];
//       $db_password = $row['user_password'];
//       $db_firstname = $row['user_firtsname'];
//       $db_lastname = $row['user_lastname'];
//       $db_role = $row['user_role'];
    
//     }
//     // $password = crypt($password,   $db_password);

//     if(password_verify($password,  $db_password)) {
//       $_SESSION['username'] =  $db_username;
//       $_SESSION['user_firtsname'] =  $db_firstname;
//       $_SESSION['user_lastname'] =  $db_lastname;
//       $_SESSION['user_role'] =  $db_role;

//      require 'views/admin-blog/index.view.php';
//     }
//   }
    // } else {

      // require 'views/blog-public/index.view.php';

    // }

    require 'views/admin-blog/index.view.php';