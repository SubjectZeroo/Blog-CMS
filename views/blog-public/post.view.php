
<?php require('partials/head.php'); ?>
<?php require('partials/popup-login.php') ?>
<main class="tile is-vertical is-8 p-6">
    <?php foreach ($posts as $post): ?>
    <div class="card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="../../images/<?= $post->post_image ?>" alt="Placeholder image">
            </figure>
        </div>
        <div class="card-content">
            <div class="content">
                <h1 class="title">
                    <?= $post->post_title ?>
                </h1>
                <?=$post->post_content?>
            </div>
        </div>    
        <div class="p-3">
            <?php foreach ($comments as $comment): ?>    
                <article class="media">
                    <figure class="media-left">
                        <p class="image is-64x64">
                            <img src="https://bulma.io/images/placeholders/128x128.png">
                        </p>
                    </figure>
                    <div class="media-content">
                        <div class="content">
                        <p>
                            <strong><?= $comment->comment_author ?></strong> 
                            <!-- <small>@johnsmith</small>  -->
                            <small><?= $comment->comment_date  ?></small>
                            <br>
                            <?= $comment->comment_content  ?>
                        </p>
                        </div>
                </article>
            <?php endforeach; ?> 
        </div>         
        <!-- Comments Form -->
        <div class="section-comment box">
            <h4 class="title">Deja un Comentario:</h4>
            <form action="/add-comment?p_id=<?= $post->post_id ?>" method="post" role="form">
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

<?php require('partials/footer.php'); ?>