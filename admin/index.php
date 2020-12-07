<?php include "../admin/includes/header.php" ?>
<main class="main">
    <header class="is-clearfix">
        <div>
            <h2>Bienvenido Al Sistema  <small> <?php echo $_SESSION['username'] ?></small></h2>
           
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
    
    <?php 
                    
                    $query = "SELECT * FROM posts WHERE  post_status = 'published'";
                    $select_all_published_posts = mysqli_query($connection,$query);
                    $published_counts = mysqli_num_rows($select_all_published_posts);   
                    

                    $query = "SELECT * FROM post_comments WHERE  comment_status = 'unapproved'";
                    $select_all_unapproved_comments = mysqli_query($connection,$query);
                    $unapproved_comments_count = mysqli_num_rows($select_all_unapproved_comments); 
                    
                    

                    
                    $query = "SELECT * FROM users WHERE  user_role = 'subscribers'";
                    $select_all_subscribers = mysqli_query($connection,$query);
                    $subscriber_count = mysqli_num_rows(  $select_all_subscribers);   
                ?>
    
                <script type="text/javascript">
                    google.charts.load('current', {'packages':['bar']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                        ['Date', 'Count'],

                        <?php 
                        $element_text = ['Active Posts','Draft Posts', 'Categories', 'Users','Comments', 'Pending Comments' ];
                        
                        $element_count = [$post_counts,$published_counts, $categories_counts,  $users_counts, $comments_counts,  $unapproved_comments_count];
                        
                        for($i = 0; $i < 5; $i++) {

                            echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";


                        }

                        ?>
                    
                        // ['Posts', 1000],
                    
                        ]);

                        var options = {
                        chart: {
                            title: '',
                            subtitle: '',
                        }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                </script>
                <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>                        
                </div> 
</main>
<?php include "includes/footer.php" ?>