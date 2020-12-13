<form action="/controller/updateUser.controller.php?edit_user=<?=$_GET['edit_user']; ?>" method="post"
  enctype="multipart/form-data">

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
    <input class="button is-success" type="submit" name="edit_user" value="Update User">
  </div>

</form>