<?php  include "view/includes/header.php"; ?>
<div class="column is-5 is-narrow">
    <section id="login">
        <div class="box">
            <div class="form-wrap">
                <h1 class="title">Registrarse</h1>
                <form role="form" action="/controller/registration.php" method="post" id="login-form" autocomplete="off">

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
                        <input class="input" type="email" name="user_email" id="user_email" placeholder="somebody@example.com"
                            autocomplete="on" value="<?php echo isset($email) ? $email : '' ?>">

                        <p><?php echo isset($error['email']) ? $error['email'] : '' ?></p>

                    </div>
                    <div class="field">
                        <label for="password" class="label">Password</label>
                        <input type="password" name="user_password" id="user_password" class="input" placeholder="Password">

                        <p><?php echo isset($error['password']) ? $error['password'] : '' ?></p>


                    </div>

                    <input type="submit" name="register" id="btn-login" class="button is-success" value="Register">
                </form>

            </div>
        </div>
    </section>
</div>
<?php include "view/includes/footer-blog.view.php";?>