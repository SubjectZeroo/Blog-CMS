<?php require('partials/head-admin.php'); ?>

<?php 

// $ListPostPublished  = $Posts->listPostsPublished();
// $PostPublished = $ListPostPublished->fetch(PDO::FETCH_ASSOC);

// foreach ($PostPublished as $PostsPublished) {
//     echo $PostsPublished;
    
// }
// $ListCommentUnaproved  = $Posts->listCommentUnaproved();
// $CommentUnaproved = $ListCommentUnaproved->fetch(PDO::FETCH_ASSOC);


// foreach ($CommentUnaproved as $CommentsUnaproved) {
//     echo $CommentsUnaproved;
    
// }

// $ListUsersSubscriber  = $Posts->listUsersSubscriber();
// $UserSubscriber = $ListUsersSubscriber->fetch(PDO::FETCH_ASSOC);;

// foreach ($UserSubscriber as $UsersSubscriber) {
//     echo $UsersSubscriber;
    
// }

?>
<header class="is-clearfix">
    <div>
        <h2>Dashboard</h2>
        <small>Bienvenido al sistema</small> 
        <?=  $_SESSION['username'] ;
        var_dump($_SESSION);
        ?>
    </div>
    <hr>
    </hr>
</header>
<div class="tile is-ancestor ">
  <div class="tile is-parent">
    <article class="tile is-child box has-background-danger">
      <div class="media has-text-white ">
        <div class="media-left">
          <i class="fas fa-file fa-3x"></i>
        </div>
        <div class="media-content">
          <div class="content ">
            <h1 class='title  has-text-white '><?= $posts ?></h1>
            <h2 class="subtitle  has-text-white ">Posts</h2>
          </div>
          <nav class="level is-mobile">
            <div class="level-left">

            </div>
          </nav>
        </div>
      </div>
      <a class="level-item has-text-white " aria-label="reply" href="./posts.php">
        <p class="mr-2">View Details</p>
      </a>
    </article>
  </div>
  <div class="tile is-parent">
    <div class="tile is-child box  has-background-warning">
      <div class="media has-text-white ">
        <div class="media-left">
        <i class="fas fa-comments fa-3x"></i>
        </div>
        <div class="media-content">
          <div class="content ">
            <h1 class='title has-text-white'><?= $comments ?></h1>
            <h2 class="subtitle  has-text-white ">Comments</h2>
          </div>
          <nav class="level is-mobile">
            <div class="level-left">
              <a class="level-item has-text-white " aria-label="reply" href="./posts.php">
                <span class="mr-2">View Details</span>
              </a>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <div class="tile is-parent">
    <div class="tile is-child box  has-background-success">
      <div class="media has-text-white ">
        <div class="media-left">
          <i class="fas fa-users fa-3x"></i>
        </div>
        <div class="media-content">
          <div class="content ">
            <div class="title  has-text-white"><?= $users ?></div>
            <h2 class="subtitle  has-text-white ">Users</h2>
          </div>
          <nav class="level is-mobile">
            <div class="level-left">
              <a class="level-item has-text-white " aria-label="reply" href="./posts.php">
                <span class="mr-2">View Details</span>
                <!-- <span class=""><i class="fa fa-arrow-circle-right"></i></span>     -->
              </a>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <div class="tile is-parent">
    <div class="tile is-child box  has-background-info">
      <div class="media has-text-white ">
        <div class="media-left">
          <i class="fas fa-boxes fa-3x"></i>
        </div>
        <div class="media-content">
          <div class="content ">
            <div class='title   has-text-white'><?= $categories ?></div>
            <h2 class="subtitle  has-text-white ">Categories</h2>
          </div>
          <nav class="level is-mobile">
            <div class="level-left">
              <a class="level-item has-text-white " aria-label="reply" href="./posts.php">
                <span class="mr-2">View Details</span>
                <!-- <span class=""><i class="fa fa-arrow-circle-right"></i></span>     -->
              </a>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>



<?php require('partials/footer-admin.php'); ?>