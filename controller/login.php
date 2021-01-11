 <?php 
 session_start();
  include "../model/users/users.model.php";

  $user = new User();

  if(isset($_POST['login'])) {
    
      $username=$_POST['username'];
      $password=$_POST['password'];

      // $username = mysqli_real_escape_string($connection, $username);
      // $password = mysqli_real_escape_string($connection, $password);


      // $query = "SELECT * FROM users WHERE username = '{$username}' ";
      // $select_user_query = mysqli_query($connection, $query);
      //   if(!$select_user_query){
      //   die("query failed". mysqli_error($connection));
      //   }

      $query = $user->showUserByUsername($username);

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
          $_SESSION['username'] =  $db_username;
          $_SESSION['user_firtsname'] =  $db_firstname;
          $_SESSION['user_lastname'] =  $db_lastname;
          $_SESSION['user_role'] =  $db_role;


          header("Location: ../../admin");
      
        } else {
          header("Location: ../../index.php");
        }

  }


?>