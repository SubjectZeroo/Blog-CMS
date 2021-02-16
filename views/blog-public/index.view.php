<?php require('partials/head.php'); ?>

<div class="column is-9">
    <?php foreach ($posts as $post): ?>
        <div class="card mt-3">
            <div class="card-image">
                <figure class="image is-2by1">
                    <img src="../../images/<?= $post->post_image ?>" alt="Placeholder image">
                </figure>
            </div>
            <div class="card-content">
                <div class="media">
                    <div class="content">
                        <h1 class="title">
                            <a href="/post?p_id=<?= $post->post_id ;?>"><?= $post->post_title ?></a>
                            <span class="tag is-primary is-medium"><?= $post->category_title ?></span>
                        </h1>
                    </div>
                </div>
                <div class="columns">
                    <div class="column is-1 mr-2">
                            <figure class="image is-48x48">
                                <img class="is-rounded" src="https://images.unsplash.com/photo-1546539782-6fc531453083?ixlib=rb-1.2.1&q=80&fm=jpg&crop=faces&fit=crop&h=200&w=200&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                    alt="Placeholder image">
                            </figure>
                    </div>
                    <div class="column" >
                            <div class="columns is-align-items-center" >
                                <div class="column">
                                    <p class=""><?= $post->username?></p>                         
                                    <span><?= $post->post_date ?></span>
                                </div>                                 
                            </div>                        
                    </div>
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
</div>
<?php require('partials/sidebar.php');?>
<?php require('partials/footer.php'); ?>