<?php require_once ("model/post/post.model.php"); ?>
<?php 
  $Posts = new Post();
  $CategoryPost = $Posts->showCategories();
  $ListCategories = $CategoryPost->fetchAll(PDO::FETCH_ASSOC);
?>
<nav class="navbar is-info " role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="index.php">
    <h1 class="title">
      DevPost 💻
    </h1>
    </a>
    <a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>
  <div id="navMenu" class="navbar-menu">      
          <?php 
                  if(isset($_SESSION['user_role'])) {
                  if(isset($_GET['p_id'])) {
                        $the_post_id = $_GET['p_id'];
                      echo "<a class='navbar-item' href='/admin/posts.php?source=edit_post&p_id={$the_post_id}'>Edit Post</a>";
                      echo "<a class='navbar-item' href='admin'>Admin</a>";
                      }
                  }                  
          ?>                     
    <div class="navbar-end">    
      <div class="navbar-item">
        <div class="buttons">
          <button class="button is-success modal-button" data-target="modal" aria-haspopup="true" onclick="refs.modalLogin.open()"> <strong>Log In </strong> </button>
          <a href="/registration.view.php" class="button is-success">
            <strong>Sign up</strong>
          </a>
        </div>     
      </div>
    </div>
  </div>
</nav>