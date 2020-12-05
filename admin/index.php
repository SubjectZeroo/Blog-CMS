<?php include "../admin/includes/header.php" ?>
<main class="main">
    <!-- <div class="columns">
                        <div class="column is-12">
                            <section class="hero ">
                                <div class="hero-body">
                                    <div class="container">
                                    <h1 class="title">
                                    Bienvenido Al Sistema
                                    </h1>
                                    <h2 class="subtitle">
                                        <?php echo $_SESSION['username'] ?>
                                    </h2>
                                    </div>
                                </div>
                            </section>
                        </div>              
                </div>  -->

    
    <header class="is-clearfix">
        <div>
            <h2>Bienvenido Al Sistema</h2>
            <small> <?php echo $_SESSION['username'] ?></small>
        </div>

    </header>
    <div class="tile is-ancestor ">
        <div class="tile is-parent">
            <article class="tile is-child box has-background-danger">
                <div class="media has-text-white ">
                    <div class="media-left">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="media-content">
                        <div class="content ">
                            <?php 
                                                        $query = "SELECT * FROM posts";
                                                        $select_all_post = mysqli_query($connection,$query);
                                                        $post_counts = mysqli_num_rows($select_all_post);   
                                                        echo   "<h1 class='title  has-text-white '>{$post_counts}</h1>"           
                                                    ?>

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
                    <!-- <span class=""><i class="fa fa-arrow-circle-right"></i></span>     -->
                </a>
            </article>
        </div>
        <div class="tile is-parent">

            <div class="tile is-child box  has-background-warning">
                <div class="media has-text-white ">
                    <div class="media-left">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="media-content">
                        <div class="content ">
                            <?php 
                                                    $query = "SELECT * FROM post_comments";
                                                    $select_all_comments = mysqli_query($connection,$query);
                                                    $comments_counts = mysqli_num_rows( $select_all_comments);   

                                                    echo   "<h1 class='title   has-text-white'>{$comments_counts}</h1>"
                                        
                                        
                                            ?>

                            <h2 class="subtitle  has-text-white ">Comments</h2>
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


            <div class="tile is-child box  has-background-success">
                <div class="media has-text-white ">
                    <div class="media-left">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="media-content">
                        <div class="content ">

                            <?php 
                                     $query = "SELECT * FROM users";
                                     $select_all_users = mysqli_query($connection,$query);
                                     $users_counts = mysqli_num_rows( $select_all_users);   

                                      echo   "<div class='title  has-text-white'>{$users_counts}</div>"
                                        
                                        
                                        ?>

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
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="media-content">
                        <div class="content ">
                            <?php 
                                     $query = "SELECT * FROM categories";
                                     $select_all_categories = mysqli_query($connection,$query);
                                     $categories_counts = mysqli_num_rows( $select_all_categories);   

                                      echo   "<div class='title   has-text-white'>{$categories_counts}</div>"
                                        
                                        
                                        ?>

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
</main>
<?php include "includes/footer.php" ?>