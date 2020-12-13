<?php include "includes/header.php" ?>

<?php require_once ("../model/users/users.model.php"); ?>
<?php 

$Users = new User();
$User = $Users->showUserByUsername($_SESSION['username']);
$ListUsersByUsername = $User->fetch(PDO::FETCH_ASSOC);
?>
          <form action="/controller/updateUser.controller.php?edit_user=<?=  $ListUsersByUsername['id']?>" method="post" enctype="multipart/form-data">

            <div class="field">
              <label class="label" for="">Firtsname</label>
              <div class="control">
                <input class="input" value="<?=  $ListUsersByUsername['user_firtsname']  ?>" name="user_firtsname" type="text">
              </div>
            </div>
            <div class="field">
              <label class="label" for="">Lastname</label>
              <div class="control">
                <input class="input" value="<?=  $ListUsersByUsername['user_lastname']  ?>" name="user_lastname" type="text">
              </div>

            </div>
            <div class="field">
              <div class="select">
                <select name="user_role" id="user_role">

                  <option selected value='0'><?=  $ListUsersByUsername['user_role']  ?></option>
                  <?php 
                    if($ListUsersByUsername['user_role'] == 'admin') {

                    echo " <option value ='subcriber'>subcriber</option>";
                    } else {
                    echo "<option value ='admin'>admin</option>";
                    }
                    ?>
                </select>
              </div>
            </div>
            <div class="field">
              <label class="label" for="username">Username</label>
              <div class="control">
                <input class="input" value="<?=  $ListUsersByUsername['username']  ?>" name="username" type="text">
              </div>
            </div>
            <div class="field">
              <label class="label" for="user_email">Email</label>
              <div class="control">
                <input class="input" value="<?=  $ListUsersByUsername['user_email']  ?>" name="user_email" type="text"></input>
              </div>
            </div>
            <div class="field">
              <label class="label" for="user_password">Password</label>
              <div class="control">
                <input class="input" value="" name="user_password"
                type="text"></input>
              </div>            
            </div>

            <div class="field">
              <input class="button is-success" type="submit" name="edit_user" value="Update Profile">
            </div>

          </form>
  <!-- /#page-wrapper -->
  <?php include "includes/footer.php" ?>