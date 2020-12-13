<?php require_once ("../model/users/users.model.php"); ?>
<?php 
$session = session_id();
$time = time();
$time_out_in_seconds = 05;
$time_out = $time - $time_out_in_seconds;


$Users = new User();
$User = $Users->showUserSession($session);
$CountUsersSession = $User->fetch(PDO::FETCH_ASSOC);
var_dump($CountUsersSession);

if($CountUsersSession == NULL) {
  $CreateUserSession = $Users->createUserSession($session,$time);
  } else {
  $UpdateUserSession = $Users->updateUserSession($session,$time);
}

$UsersOnline = $Users->showUsersOnline($time_out);
$CountUserSession = $UsersOnline->fetch(PDO::FETCH_ASSOC);


foreach ($CountUserSession as $CountUsersSession );
?>


<?php 
//  $session = session_id();
//  $time = time();
//  $time_out_in_seconds = 05;
//  $time_out = $time - $time_out_in_seconds;


//  $query = "SELECT * FROM users_online WHERE session = '$session'";
//  $send_query = mysqli_query($connection, $query);
//  $count = mysqli_num_rows($send_query);

//   if($count == NULL) {

//      mysqli_query($connection, "INSERT INTO users_online(session, time) VALUES('$session','$time')");


//      } else {

//      mysqli_query($connection, "UPDATE users_online SET time = '$time' WHERE session = '$session'");


//      }

//  $users_online_query =  mysqli_query($connection, "SELECT * FROM users_online WHERE time > '$time_out'");
//  echo $count_user = mysqli_num_rows($users_online_query);





?>

<nav class="navbar is-fixed-top is-dark" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="../index.php">
      <!-- <img src="https://bulma.io/images/bulma-logo.png"
        alt="Bulma: Free, open source, and modern CSS framework based on Flexbox" width="112" height="28"> -->
        Mini CRM
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>

  </div>
  <div class="navbar-end">    
      <div class="navbar-item">
            Users Online:
            <?= $CountUsersSession  ;?>
      </div>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link" >
        <?php 
           if(isset($_SESSION['username'])){
              echo $_SESSION['username'];
           }
    
           
           
           ?>
        </a>
        <div class="navbar-dropdown is-right">
          <a class="navbar-item" href="profiles.php">
            Edit Profile
          </a>
          
          <hr class="navbar-divider">
          <a class="navbar-item" href="/admin/includes/logout.php">
            Log Out
          </a>
        </div>
      </div>
  </div> 
</nav>