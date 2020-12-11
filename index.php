
<?php include  "includes/header.php"?>
<?php require_once ("model/post/post.model.php"); 
 $limit = 6;
$Posts = new Post();
$ListPosts  = $Posts->showPosts();
$CountPost = $Posts->countPosts();
$Lista = $ListPosts->fetchAll(PDO::FETCH_ASSOC);


$count = $CountPost->fetchAll(PDO::FETCH_ASSOC);

$total = $count[0]['id'];
$pages = ceil($total / $limit);
?>

<div class="modal" id="modalLogin">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="section-login box">
            <h4 class="title">Login</h4>
            <form action="includes/login.php" method="POST">
                <div class="field">
                    <label class="label">Username</label>
                    <p class="control has-icons-left has-icons-right">
                        <input name="username" type="text" class="input" placeholder="Enter Username">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-check"></i>
                        </span>
                    </p>
                </div>
                <div class="field">
                    <label class="label">Password</label>
                    <p class="control has-icons-left has-icons-right">
                        <input name="password" type="password" class="input" placeholder="Enter password">
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-check"></i>
                        </span>
                    </p>

                </div>
                <div class="field">
                    <p class="control">
                        <button class="button is-success" name="login" type="submit">
                            Login
                        </button>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <button class="modal-close is-large" aria-label="close" onclick="refs.modalLogin.close()"></button>
</div>

<!-- Page Content -->
<div class="column is-9">

    <?php foreach ($Lista as $Post): ?>
        <?php 
        // echo('<pre>');
        //  var_dump($Post);
        // echo('</pre>');
        ?>
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
                    <p class="title is-4"> <a href="index.php"><?=$Post['post_author']?></a></p>
                    <time datetime="2016-1-1"><?= $Post['post_date'] ?></time>
                    <!-- <p class="subtitle is-6">@johnsmith</p> -->
                </div>
            </div>
            <div class="content">
                <h1 class="title">
                    <a href="post.php?p_id=<?= $Post['post_id'] ;?>"><?= $Post['post_title'] ?></a>
                </h1>
                <?= $Post['post_content'] ?>

                <a class="btn btn-primary" href="post.php?p_id=<?= $Post['post_id'] ;?>">Leer Mas... </a>
            </div>
        </div>
    </div>
    <?php endforeach; ?> 
    <nav class="pagination mt-3" role="navigation" aria-label="pagination">
        <ul class="pagination-list">
            <?php for($i = 1; $i <= $pages; $i++) : ?>
                <li>
                    <a href='index.php?page=<?=$i; ?>' class='pagination-link' aria-label=''><?= $i; ?></a>
                </li>
            <?php endfor; ?>  
            
        </ul>
    </nav>
</div>
<hr>
<?php include  "includes/sidebar.php"?>
<?php include  "includes/footer.php"?>