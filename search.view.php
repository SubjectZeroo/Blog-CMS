<?php include  "view//includes/header.php"?>
<?php 
$Posts = new Post();
$SearchPost  = $Posts->searchPost($_POST['search']);
$ListAllSearchPost = $SearchPost->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="column is-9">
      <?php foreach ($ListAllSearchPost as $ListAllSearchPosts): ?>
        <div class="card">
            <div class="card-image">
                <!-- <figure class="image is-4by3"> -->
                <img src="http://placehold.it/1200x420" alt="Placeholder image">
                <!-- </figure> -->
            </div>
            <div class="card-content">
                <div class="media">
                    <div class="media-left">
                        <figure class="image is-64x64">
                            <img class="is-rounded" src="https://bulma.io/images/placeholders/96x96.png"
                                alt="Placeholder image">
                        </figure>
                    </div>
                    <div class="media-content">
                        <p class="title is-4"> <a href="index.php"><?=$ListAllSearchPosts['post_author']?></a></p>
                        <time datetime="2016-1-1"><?= $ListAllSearchPosts['post_date'] ?></time>
                        <!-- <p class="subtitle is-6">@johnsmith</p> -->
                    </div>
                </div>
                <div class="content">
                    <h1 class="title">
                        <a href="post.php?p_id=<?= $ListAllSearchPosts['post_id'] ;?>"><?= $ListAllSearchPosts['post_title'] ?></a>
                    </h1>
                    <?= $ListAllSearchPosts['post_content'] ?>

                    <a class="btn btn-primary" href="post.view.php?p_id=<?= $ListAllSearchPosts['post_id'] ;?>">Leer Mas... </a>
                </div>
            </div>
        </div>
       <?php endforeach; ?> 
</div>
<hr>
<?php include  "view/includes/sidebar.php"?>
<?php include  "view/includes/footer-blog.view.php" ?>