<?php include "includes/db.php" ?>
<?php include  "includes/header.php"?>

<!-- Navigation -->
<?php include  "includes/navigation.php"?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">


        <?php
        if(isset($_GET['p_id'])) {
            $the_post_id = $_GET['p_id'];
        }


        $query = "SELECT * from posts WHERE post_id = $the_post_id";
        $select_all_posts_query = mysqli_query($connection, $query);
                    
        while($row = mysqli_fetch_assoc( $select_all_posts_query)) {
              $post_title = $row['post_title'];
              $post_author = $row['post_author'];
              $post_date = $row['post_date'];
              $post_image = $row['post_image'];
              $post_content = $row['post_content'];
                    
        
                ?>
            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>
            <!-- First Blog Post -->
            <h2>
                <a href="#"><?= $post_title ?></a>
            </h2>
            <p class="lead">
                by <a href="index.php"><?= $post_author ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span><?= $post_date ?></p>
            <hr>
            <img class="img-responsive" src="http://placehold.it/900x300" alt="">
            <hr>
            <p><?= $post_content ?></p>
          
            <hr>
            <?php        }
 ?>
      

            <!-- Pager -->
            <!-- <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul> -->
            <?php
            if(isset($_POST['create_comment'])){
            
                $the_post_id = $_GET['p_id'];

               $comment_author =  $_POST['comment_author'];
               $comment_email =  $_POST['comment_email'];
               $comment_content =  $_POST['comment_content'];


               $query = "INSERT INTO post_comments (
                   comment_post_id, 
                   comment_author, 
                   comment_email, 
                   comment_content, 
                   comment_status, 
                   comment_date)";

                 $query .= "VALUES (
                    $the_post_id, 
                   '{$comment_author}', 
                   '{$comment_email}', 
                   '{$comment_content}', 
                   'unaproved', 
                    now())";

                    $create_comment_query = mysqli_query($connection, $query);

                    if(!$create_comment_query){
                        die('QUERY FAILED' . mysqli_error($connection));
                    }


                    $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                    $query .= "WHERE post_id = $the_post_id ";

                    $update_comment_count =  mysqli_query($connection, $query);
            }
            ?>

              
            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form action="#" method="post" role="form">

                    <div class="form-group">
                        <label for="Author">Author</label>
                        <input type="text" name="comment_author" class="form-control" name="comment_author">
                    </div>

                    <div class="form-group">
                        <label for="Author">Email</label>
                        <input type="email" name="comment_email" class="form-control" name="comment_email">
                    </div>

                      <div class="form-group">
                        <label for="comment">Your Comment</label>
                        <textarea name="comment_content" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <hr>
        <?php
        $query = "SELECT * FROM post_comments WHERE comment_post_id = {$the_post_id} ";

        $query .= "AND comment_status = 'approved' ";
        $query .= "ORDER BY id DESC";

        $select_comment_query = mysqli_query($connection, $query);

        if(!$select_comment_query) {
            die('Query Failed' . mysqli_error($connection));
        }

        while($row = mysqli_fetch_array($select_comment_query)) {
            $comment_date = $row['comment_date'];
            $comment_content = $row['comment_content'];
            $comment_author = $row['comment_author'];
            ?>

            <div class="media">
                <a href="" class="pull-left">
                    <img src="" alt="" class="media-object">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?= $comment_author ?>
                        <small><?= $comment_date ?></small>
                    </h4>
                  <?= $comment_content ?>
                </div>

            </div>

       <?php } ?>


        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include  "includes/sidebar.php"?>
    </div>
    <!-- /.row -->

    <hr>
    <?php include  "includes/footer.php"?>

    