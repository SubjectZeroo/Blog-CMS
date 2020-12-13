
<?php include  "includes/header.php"?>

<?php require_once ("../model/post/post.model.php"); ?>
<?php 

$Posts = new Post();
$ListPost  = $Posts->listPosts();
$Post = $ListPost->rowCount();

$ListComments  = $Posts->listComments();
$Comment = $ListComments->rowCount();

$ListUsers  = $Posts->listUsers();
$User = $ListUsers->rowCount();

$ListCategories  = $Posts->listCategories();
$Category = $ListCategories->rowCount();





$ListPostPublished  = $Posts->listPostsPublished();
$PostPublished = $ListPostPublished->fetch(PDO::FETCH_ASSOC);

foreach ($PostPublished as $PostsPublished) {
    echo $PostsPublished;
    
}
$ListCommentUnaproved  = $Posts->listCommentUnaproved();
$CommentUnaproved = $ListCommentUnaproved->fetch(PDO::FETCH_ASSOC);


foreach ($CommentUnaproved as $CommentsUnaproved) {
    echo $CommentsUnaproved;
    
}

$ListUsersSubscriber  = $Posts->listUsersSubscriber();
$UserSubscriber = $ListUsersSubscriber->fetch(PDO::FETCH_ASSOC);;

foreach ($UserSubscriber as $UsersSubscriber) {
    echo $UsersSubscriber;
    
}

?>

    <header class="is-clearfix">
        <div>
            <h2>Welcome to the sistem  <small> <?php echo $_SESSION['username'] ?></small></h2>
           
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
                                <h1 class='title  has-text-white '><?= $Post ?></h1>                                           
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
                            <h1 class='title has-text-white'><?= $Comment ?></h1>                          
                            <h2 class="subtitle  has-text-white ">Comments</h2>
                        </div>
                        <nav class="level is-mobile">
                            <div class="level-left">
                                <a class="level-item has-text-white " aria-label="reply" href="./posts.php">
                                    <span class="mr-2">View Details</span>
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
                            <div class='title  has-text-white'><?= $User ?></div>
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
                            <div class='title   has-text-white'><?= $Category ?></div>
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
    
   
    
                <script type="text/javascript">
                    google.charts.load('current', {'packages':['bar']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                        ['Date', 'Count'],

                        <?php 
                        $element_text = ['Post Published','Comments','Users Subscriber'];
                        
                        $element_count = [$PostsPublished, $CommentsUnaproved, $UsersSubscriber];
                        
                        for($i = 0; $i < 3; $i++) {

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

<?php include "includes/footer.php" ?>