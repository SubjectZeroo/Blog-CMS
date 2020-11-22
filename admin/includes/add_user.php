
<?php 
if(isset($_POST['create_user'])) {

  // $user_id = $_POST['id'];
  $user_firtsname = $_POST['user_firtsname']; 
  $user_lastname = $_POST['user_lastname'];
  $user_role = $_POST['user_role'];
  $username =  $_POST['username'];
  $user_email = $_POST['user_email'];
  $user_password = $_POST['user_password'];

  
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


    if(!$create_user) {
      die("QUERY FAILED" . mysqli_error($connection));
    }
}

?>





<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label for="">Firtsname</label>
        <input class="form-control" name="user_firtsname" type="text">
    </div>


    <div class="form-group">
      <label for="">Lastname</label>
        <input class="form-control" name="user_lastname" type="text">
    </div>


<div class="form-group">
 <select name="user_role" id="user_role">
  <option selected value ='0'>Seleccione</option>
  <option value ='admin'>admin</option>
  <option value ='subcriber'>subcriber</option>
 </select>
</div>




<div class="form-group">
  <label for="username">Username</label>
    <input class="form-control" name="username" type="text">
</div>


<div class="form-group">
  <label for="user_email">Email</label>
   <input class="form-control" name="user_email" type="text"></input>
</div>



<div class="form-group">
  <label for="user_password">Password</label>
   <input class="form-control" name="user_password" type="text"></input>
</div>

<div class="form-group">
  <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
</div>

</form>