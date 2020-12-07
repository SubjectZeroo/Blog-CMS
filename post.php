<?php include "includes/db.php" ?>
<?php include  "includes/header.php"?>

<div class="column is-9">

    <?php
                    if(isset($_GET['p_id'])) {
                        $the_post_id = $_GET['p_id'];
                    }
                    $query = "SELECT * from posts WHERE post_id = $the_post_id";
                    $select_all_posts_query = mysqli_query($connection, $query);
                                
                    while($row = mysqli_fetch_assoc( $select_all_posts_query)) {
                        $post_title = $row['post_title'];
                        $post_user = $row['post_user'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                                
                    
                            ?>

    <div class="card">
        <div class="card-image">
            <!-- <figure class="image is-4by3"> -->
            <img src="http://placehold.it/1200x420" alt="Placeholder image">
            <!-- </figure> -->
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-left">
                    <figure class="image is-48x48">
                        <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                    </figure>
                </div>
                <div class="media-content">
                    <p class="title is-4"> <a href="index.php"><?=$post_user?></a></p>
                    <!-- <p class="subtitle is-6">@johnsmith</p> -->
                </div>
            </div>
            <div class="content">
                <h1 class="title">
                    <a href="post.php?p_id=<?= $post_id ;?>"><?= $post_title ?></a>
                </h1>
                <?= $post_content ?>
                <time datetime="2016-1-1"><?= $post_date ?></time>
            </div>
        </div>
        <?php }
                                        ?>
        <?php
                if(isset($_POST['create_comment'])){


                    $the_post_id = $_GET['p_id'];
                    $comment_author =  $_POST['comment_author'];
                    $comment_email =  $_POST['comment_email'];
                    $comment_content =  $_POST['comment_content'];

                    if(!empty($comment_author) && !empty( $comment_email) &&!empty( $comment_content) ) {
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
        
        
                            // $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                            // $query .= "WHERE post_id = $the_post_id ";
        
                            // $update_comment_count =  mysqli_query($connection, $query);
                    } else {
                        echo "<script> alert('Fields cannot be empty')</script>";
                    }
                    }            
                ?>
        <!-- Comments Form -->
        <div class="section-comment box">
            <h4 class="title">Deja un Comentario:</h4>
            <form action="#" method="post" role="form">

                <div class="field">
                    <label class="label" for="Author">Author</label>
                    <div class="control">
                        <input type="text" name="comment_author" class="input" name="comment_author">
                    </div>

                </div>

                <div class="field">
                    <label class="label" for="Author">Email</label>
                    <div class="control">
                        <input type="email" name="comment_email" class="input" name="comment_email">
                    </div>

                </div>

                <div class="field">
                    <label class="label" for="comment">Tu mensaje</label>
                    <div class="control">
                        <textarea name="comment_content" class="textarea" rows="3"></textarea>
                    </div>

                </div>
                <button type="submit" name="create_comment" class="button is-success">Postear</button>
            </form>
        </div>
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
</div>
<!-- /.row -->
<hr>
<?php include  "includes/sidebar.php"?>
<?php include  "includes/footer.php"?>