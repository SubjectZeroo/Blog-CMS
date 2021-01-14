<?php require('partials/head.php'); ?>

<main class="tile is-vertical is-8 p-6">
    <?php foreach ($posts as $post): ?>
        <div class="card mt-3">
            <div class="card-image">
                <!-- <figure class="image is-4by3"> -->
                <img src="http://placehold.it/1000x420" alt="Placeholder image">
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
                        <p class="title is-4"> <a href="/post"><?= $post->post_author?></a></p>
                        <time datetime="2016-1-1"><?= $post->post_date ?></time>
                        <!-- <p class="subtitle is-6">@johnsmith</p> -->
                    </div>
                </div>
                <div class="content">
                    <h1 class="title">
                        <a href="/post?p_id=<?= $post->post_id ;?>"><?= $post->post_title ?></a>
                    </h1>
                    <?= $post->post_content ?>

                    <a class="btn btn-primary" href="post.php?p_id=<?= $post->post_id ;?>">Leer Mas... </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <nav class="pagination mt-3" role="navigation" aria-label="pagination">
        <ul class="pagination-list">
            <?php for($i = 1; $i <= $pages; $i++) : ?>
            <li>
                <a href='/?page=<?=$i; ?>' class='pagination-link' aria-label=''><?= $i; ?></a>
            </li>
            <?php endfor; ?>

        </ul>
    </nav>
</main>
<?php require('partials/sidebar.php');?>
<?php require('partials/footer.php'); ?>