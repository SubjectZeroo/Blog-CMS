<div class="modal" id="modalLogin">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="section-login box">
            <h4 class="title">Login</h4>
            <form action="/controller/login.php" method="POST">
                <div class="field">
                    <label class="label">Username</label>
                    <p class="control has-icons-left has-icons-right">
                        <input name="username" type="text" class="input" placeholder="Enter Username">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-check"></i>
                        </span>
                    </p>
                </div>
                <div class="field">
                    <label class="label">Password</label>
                    <p class="control has-icons-left has-icons-right">
                        <input name="password" type="password" class="input" placeholder="Enter password">
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-check"></i>
                        </span>
                    </p>

                </div>
                <div class="field">
                    <p class="control">
                        <button class="button is-success" name="login" type="submit">
                            Login
                        </button>
                    </p>
                </div>
            </form>
        </div>
    </div>
    <button class="modal-close is-large" aria-label="close" onclick="refs.modalLogin.close()"></button>
</div>
