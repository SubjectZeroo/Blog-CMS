<?php 
if(isset($_POST['create_user'])) {

  // $user_id = $_POST['id'];
  $user_firtsname = $_POST['user_firtsname']; 
  $user_lastname = $_POST['user_lastname'];
  $user_role = $_POST['user_role'];
  $username =  $_POST['username'];
  $user_email = $_POST['user_email'];
  $user_password = $_POST['user_password'];

  $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));
  // $post_date = date('d-m-y');
  // $post_image = $_FILES['image']['name'];
  // $post_image_temp = $_FILES['image']['name'];
  // move_uploaded_file($post_image_temp, "../images/$post_image");



  $query = "INSERT INTO users( 
                              user_firtsname, 
                              user_lastname,
                              user_email, 
                              username, 
                              user_password,
                              user_role)";

$query .= "VALUES (
                   '{$user_firtsname}',
                   '{$user_lastname}',
                   '{$user_email}',
                   '{$username}',
                   '{$user_password}',
                   '{$user_role}')";

    $create_user = mysqli_query($connection, $query);

// confirmQuery($create_user);

Echo "User Created " . " " . "<a href='users.php'>View User</a>";
    if(!$create_user) {
      die("QUERY FAILED" . mysqli_error($connection));
    }
}

?>

<form action="" method="post" enctype="multipart/form-data">

  <div class="field">
    <label class="label" for="">Firtsname</label>
    <div class="control">
       <input class="input" name="user_firtsname" type="text">
    </div>
  </div>


  <div class="field">
    <label class="label" for="">Lastname</label>
    <input class="input" name="user_lastname" type="text">
  </div>


  <div class="field">
    <div class="select">
      <select name="user_role" id="user_role">
        <option selected value='0'>Seleccione</option>
        <option value='admin'>admin</option>
        <option value='subcriber'>subcriber</option>
      </select>
    </div>
  </div>




  <div class="field">
    <label class="label" for="username">Username</label>
    <input class="input" name="username" type="text">
  </div>


  <div class="field">
    <label class="label" for="user_email">Email</label>
    <div class="control">
      <input class="input" name="user_email" type="text"></input>
    </div>
  </div>



  <div class="field">
    <label class="label" for="user_password">Password</label>
    <div class="control">
      <input class="input" name="user_password" type="text"></input>  
    </div>
  </div>

  <div class="control">
    <input class="button is-link is-light" type="submit" name="create_user" value="Add User">
  </div>

</form>