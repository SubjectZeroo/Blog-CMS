<?php  include "config/db.php"; ?>
<?php  include "../includes/header.php"; ?>

<?php
if(isset($_POST['resgister'])){

    $username = $_POST['username'] ;
    $email = $_POST['email'];
    $password =$_POST['password'];

    if(!empty($username) && !empty($email) && !empty($password)) {
        $username = mysqli_real_escape_string($connection, $username);
        $email =    mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);
        $password = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 12));
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

<div class="column is-5 is-narrow">
    <section id="login">
        <div class="box">
            <div class="form-wrap">
                <h1 class="title">Registrarse</h1>
                <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">

                    <h6 class="text-center"><?php echo $message; ?></h6>
                    <div class="field">
                        <label for="username" class="label">username</label>
                        <input class="input" type="text" name="username" id="username"
                            placeholder="Enter Desired Username" autocomplete="on"
                            value="<?php echo isset($username) ? $username : '' ?>">

                        <p><?php echo isset($error['username']) ? $error['username'] : '' ?></p>


                    </div>
                    <div class="field">
                        <label class="label" for="email">Email</label>
                        <input class="input" type="email" name="email" id="email" placeholder="somebody@example.com"
                            autocomplete="on" value="<?php echo isset($email) ? $email : '' ?>">

                        <p><?php echo isset($error['email']) ? $error['email'] : '' ?></p>

                    </div>
                    <div class="field">
                        <label for="password" class="label">Password</label>
                        <input type="password" name="password" id="key" class="input" placeholder="Password">

                        <p><?php echo isset($error['password']) ? $error['password'] : '' ?></p>


                    </div>

                    <input type="submit" name="resgister" id="btn-login" class="button is-success" value="Register">
                </form>

            </div>
        </div>
    </section>
</div>
<?php include "includes/footer.php";?>