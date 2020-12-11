
<?php include  "includes/header.php"?>
<?php require_once ("model/post/post.model.php"); ?>

<?php 

$Posts = new Post();
$CategoryPost  = $Posts->showPostById($_GET['p_id']);
$ListCategoryById = $CategoryPost->fetchAll(PDO::FETCH_ASSOC);

$CommentPost  = $Posts->showComments($_GET['p_id']);
$ListComments = $CommentPost->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="column is-9">
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
        <?php foreach ($ListComments as $ListComment): ?>
            <div class="media">
                <a href="" class="pull-left">
                    <img src="" alt="" class="media-object">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?= $ListComment['comment_author'] ?>
                        <small><?= $ListComment['comment_date']  ?></small>
                    </h4>
                    <?= $ListComment['comment_content']  ?>
                </div>
            </div>
        <?php endforeach; ?>
        
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
   
</div>
<hr>
<?php include  "includes/sidebar.php"?>
<?php include  "includes/footer.php"?>