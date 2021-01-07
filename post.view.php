
<?php include  "view/includes/header.php"?>
<?php require_once ("model/post/post.model.php"); ?>

<?php 

$Posts = new Post();
$CategoryPost  = $Posts->showPostById($_GET['p_id']);
$ListCategoryById = $CategoryPost->fetchAll(PDO::FETCH_ASSOC);

$CommentPost  = $Posts->showComments($_GET['p_id']);
$ListComments = $CommentPost->fetchAll(PDO::FETCH_ASSOC);

?>

<main class="tile is-vertical is-8 p-6">
    <?php foreach ($ListCategoryById as $ListPost): ?>
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
                    <p class="title is-4"> <a href="index.php"><?=$ListPost['post_user']?></a></p>
                    <!-- <p class="subtitle is-6">@johnsmith</p> -->
                </div>
            </div>
            <div class="content">
                <h1 class="title">
                    <a href="post.php?p_id=<?=$ListPost['post_id']?>"><?=$ListPost['post_title']?></a>
                </h1>
                <?=$ListPost['post_content']?>
                <time datetime="2016-1-1"><?=$ListPost['post_date']?></time>
            </div>
        </div>
         
        <div class="p-3">
            <?php foreach ($ListComments as $ListComment): ?>    
                <article class="media">
                    <figure class="media-left">
                        <p class="image is-64x64">
                        <img src="https://bulma.io/images/placeholders/128x128.png">
                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="content">
                        <p>
                            <strong><?= $ListComment['comment_author'] ?></strong> 
                            <!-- <small>@johnsmith</small>  -->
                            <small><?= $ListComment['comment_date']  ?></small>
                            <br>
                            <?= $ListComment['comment_content']  ?>
                        </p>
                        </div>
                        <!-- <nav class="level is-mobile">
                        <div class="level-left">
                            <a class="level-item">
                            <span class="icon is-small"><i class="fas fa-reply"></i></span>
                            </a>
                            <a class="level-item">
                            <span class="icon is-small"><i class="fas fa-retweet"></i></span>
                            </a>
                            <a class="level-item">
                            <span class="icon is-small"><i class="fas fa-heart"></i></span>
                            </a>
                        </div>
                        </nav> -->
                    <!-- </div>
                    <div class="media-right">
                        <button class="delete"></button>
                    </div> -->
                </article>
            <?php endforeach; ?> 
        </div>         
        <!-- Comments Form -->
        <div class="section-comment box">
            <h4 class="title">Deja un Comentario:</h4>
            <form action="/controller/addComment.php?p_id=<?=$ListPost['post_id']?>" method="post" role="form">
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
       
       
    </div>
 <?php endforeach; ?>
   
</main>
<hr>
<?php include  "view/includes/sidebar.php"?>
<?php include  "view/includes/footer-blog.view.php"?>