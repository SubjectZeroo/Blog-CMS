<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="index.php">
      <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
    </a>

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
<!-- 
      <a class="navbar-item">
        Home
      </a>

      <a class="navbar-item">
        Documentation
      </a> -->
      <?php   
            $query = "SELECT * FROM categories";
            $select_all_categories_query = mysqli_query($connection, $query);
                    
                    while($row = mysqli_fetch_assoc( $select_all_categories_query)) {
                      $cat_title = $row['category_title'];

                      echo " <a class='navbar-item'  href='#'>{$cat_title}</a>";
                    }
                    
        ?>
      <!-- <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          More
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item">
            About
          </a>
          <a class="navbar-item">
            Jobs
          </a>
          <a class="navbar-item">
            Contact
          </a>
          <hr class="navbar-divider">
          <a class="navbar-item">
            Report an issue
          </a>
        </div>
      </div> -->
      <?php 
                    // var_dump($_SESSION['user_role']);
                    // var_dump( $_SESSION['username']);
                     if(isset($_SESSION['user_role'])) {
                        if(isset($_GET['p_id'])) {
                            $the_post_id = $_GET['p_id'];
                            echo "<a class='navbar-item' href='/admin/posts.php?source=edit_post&p_id={$the_post_id}'>Edit Post</a>";
                        }
                     }                  
      ?>
    </div>

    <div class="navbar-end">
      <!-- <div class="navbar-item">
        <div class="buttons">
          <a class="button is-primary">
            <strong>Sign up</strong>
          </a>
          <a class="button is-light">
            Log in
          </a>
        </div>
      </div> -->
      <div class="navbar-item">
        <div class="buttons">
          <button class="button is-primary modal-button" data-target="modal" aria-haspopup="true" onclick="refs.modalLogin.open()"> <strong>Log In </strong> </button>
          <a class="button is-primary">
            <strong>Sign up</strong>
          </a>
        </div>
       
        
      </div>
    </div>
  </div>
</nav>
