<?php require_once ("model/post/post.model.php"); ?>

<?php 

$Posts = new Post();
$CategoryPost = $Posts->showCategories();
$ListCategories = $CategoryPost->fetchAll(PDO::FETCH_ASSOC);

?>


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

    <?php foreach ($ListCategories as $ListCategory): ?>

                       <a class='navbar-item'  href='<?= $ListCategory['category_id']?>'><?= $ListCategory['category_title']?></a>
       
      <?php endforeach; ?>
      <?php 
              if(isset($_SESSION['user_role'])) {
              if(isset($_GET['p_id'])) {
                    $the_post_id = $_GET['p_id'];
                  echo "<a class='navbar-item' href='/admin/posts.php?source=edit_post&p_id={$the_post_id}'>Edit Post</a>";
                  }
              }                  
      ?>
       
                        <a class="navbar-item" href="admin">Admin</a>
                   
    </div>
    <div class="navbar-end">    
      <div class="navbar-item">
        <div class="buttons">
          <button class="button is-primary modal-button" data-target="modal" aria-haspopup="true" onclick="refs.modalLogin.open()"> <strong>Log In </strong> </button>
          <a href="/registration.php" class="button is-primary">
            <strong>Sign up</strong>
          </a>
        </div>     
      </div>
    </div>
  </div>
</nav>
