<?php 



if(isset($_GET['edit_user'])){
    $the_user_id = $_GET['edit_user'];

    $query = "SELECT * FROM users WHERE id =   $the_user_id ";
    $select_users_query = mysqli_query($connection, $query);                       
    while($row = mysqli_fetch_assoc($select_users_query)) {
      $user_id = $row['id'];
      $username = $row['username'];
      $user_password = $row['user_password'];
      $user_firtsname = $row['user_firtsname'];
      $user_lastname = $row['user_lastname'];
      $user_email = $row['user_email'];
      // $user_image = $row['user_image'];
      // $user_role = $row['user_role'];
    }

}





if(isset($_POST['edit_user'])) {

  // $user_id = $_POST['id'];
  $user_firtsname = $_POST['user_firtsname']; 
  $user_lastname = $_POST['user_lastname'];
  // $user_role = $_POST['user_role'];
  $username =  $_POST['username'];
  $user_email = $_POST['user_email'];
  $user_password = $_POST['user_password'];  
  $post_date = date('d-m-y');
  // $post_image = $_FILES['image']['name'];
  // $post_image_temp = $_FILES['image']['name'];
  // move_uploaded_file($post_image_temp, "../images/$post_image");

  
 


if(!empty($user_password)){
  $query_password = "SELECT user_password FROM users WHERE users = $the_user_id";
  $get_user_query = mysqli_query($connection, $query); 

  $row = mysqli_fetch_array($get_user_query);
  $db_user_password = $row['user_password'];

    
  if($db_user_password != $user_password) {
    $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));
  }

   
  $query = "UPDATE  users SET "; 
  $query .= "user_firtsname = '{$user_firtsname}',";
  $query .="user_lastname = '{$user_lastname}',"; 
  // $query .="user_role = '{$user_role}',";     
  $query .="username = '{$username}',";              
  $query .="user_email = '{$user_email}',";   
  $query .="user_password = '{$hashed_password}'"; 
  $query .="WHERE id = {$user_id}";    

  $update_user = mysqli_query($connection, $query);


    if(!$update_user) {
      die("QUERY FAILED" . mysqli_error($connection));
    }
}

}
// }  else {
//   header("Location: index.php");
// }

?>




<form action="" method="post" enctype="multipart/form-data">

  <div class="field">
    <label class="label" for="">Firtsname</label>
    <div class="control">
      <input class="input" class="form-control" value="<?php  echo $user_firtsname;  ?>" name="user_firtsname"
        type="text">
    </div>
  </div>


  <div class="field">
    <label class="label" for="">Lastname</label>
    <div class="control">
      <input class="input" class="form-control" value="<?php  echo $user_lastname;  ?>" name="user_lastname"
        type="text">
    </div>
  </div>


  <div class="field">
    <label class="label" for="username">Username</label>
    <div class="control">
      <input class="input" value="<?php  echo $username;  ?>" name="username" type="text">
    </div>  
  </div>


  <div class="field">
    <label class="label" for="user_email">Email</label>
    <div class="control">
      <input class="input" value="<?php  echo $user_email;  ?>" name="user_email" type="text"></input>
    </div>  
  </div>



  <div class="field">
    <label class="label" for="user_password">Password</label>
    <div class="control">
      <input class="input" class="form-control" autocomplete="off" name="user_password" type="text"></input>
    </div>  
  </div>

  <div class="field">
    <input class="button is-success" type="submit" name="edit_user" value="Add User">
  </div>

</form>