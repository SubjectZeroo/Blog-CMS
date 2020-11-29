<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>
 
<?php
if(isset($_POST['resgister'])){

    $username = $_POST['username'] ;
    $email = $_POST['email'];
    $password =$_POST['password'];


    if(!empty($username) && !empty($email) && !empty($password)) {

        $username = mysqli_real_escape_string($connection, $username);
        $email =    mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);



        $query = "SELECT randSalt FROM users";
        $select_randsalt_query = mysqli_query($connection,$query);

        if(!$select_randsalt_query) {
            die("Query Failed" . mysqli_error($connection));
        }

        $row = mysqli_fetch_array($select_randsalt_query);
        $salt = $row['randSalt'];

        $password = crypt($password, $salt);
        


        $query = "INSERT INTO users (username, user_email, user_password, user_role) ";
        $query .= "VALUES('{$username}','{$email}','{$password}','subcriber' )";
        $register_user_query = mysqli_query($connection, $query);
        if(!$register_user_query) {
            die("Query Failed". mysqli_error($connection) . ' ' .  mysqli_errno($connection));
        
        }

        $message = "Te Registraste en la pagina";
        
    } else {
        $message = "Los campos no pueden estar vacios";
    }

} else {
    $message  = "";
}

// require 'vendor/autoload.php';

// $dotenv = new \Dotenv\Dotenv(__DIR__);
// $dotenv->load();



// $options = array(
//     'cluster' => 'us2',
//     'encrypted' => true
// );

// $pusher = new Pusher\Pusher(getenv('APP_KEY'), getenv('APP_SECRET'), getenv('APP_ID'), $options);




// if($_SERVER['REQUEST_METHOD'] == "POST") {

//     $username = trim($_POST['username']);
//     $email    = trim($_POST['email']);
//     $password = trim($_POST['password']);


//     $error = [

//         'username'=> '',
//         'email'=>'',
//         'password'=>''

//     ];


//     if(strlen($username) < 4){

//         $error['username'] = 'Username needs to be longer';


//     }

//      if($username ==''){

//         $error['username'] = 'Username cannot be empty';


//     }


//      if(username_exists($username)){

//         $error['username'] = 'Username already exists, pick another another';


//     }



//     if($email ==''){

//         $error['email'] = 'Email cannot be empty';


//     }


//      if(email_exists($email)){

//         $error['email'] = 'Email already exists, <a href="index.php">Please login</a>';


//     }


//     if($password == '') {


//         $error['password'] = 'Password cannot be empty';

//     }



//     foreach ($error as $key => $value) {
        
//         if(empty($value)){

//             unset($error[$key]);

//         }



//     } // foreach

//     if(empty($error)){

//         register_user($username, $email, $password);

//         $data['message'] = $username;

//         $pusher->trigger('notifications', 'new_user', $data);

//         login_user($username, $password);


//     }

    

// } 


?>
 

    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Regdasdister</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                       
                        <h6 class="text-center"><?php echo $message; ?></h6>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username"

                            autocomplete="on"

                            value="<?php echo isset($username) ? $username : '' ?>">

                            <p><?php echo isset($error['username']) ? $error['username'] : '' ?></p>

                       
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" autocomplete="on" value="<?php echo isset($email) ? $email : '' ?>" >

                             <p><?php echo isset($error['email']) ? $error['email'] : '' ?></p>
              
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">

                            <p><?php echo isset($error['password']) ? $error['password'] : '' ?></p>


                        </div>
                
                        <input type="submit" name="resgister" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
