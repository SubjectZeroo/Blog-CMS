<?php include "includes/header.php" ?>

    <div id="wrapper">

   <?php if($connection) echo "Conn" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Bienvenido Al Sistema
                            <small>Sistemas</small>

                            <?php echo $_SESSION['username'] ?>
                        </h1>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-file-text fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                        <?php 
                                     $query = "SELECT * FROM posts";
                                     $select_all_post = mysqli_query($connection,$query);
                                     $post_counts = mysqli_num_rows($select_all_post);   

                                      echo   "<div class='huge'>{$post_counts}</div>"
                                        
                                        
                                        ?>
                                            <!-- <div class="huge">20</div> -->
                                            <div>Posts</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="./posts.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div> 
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-file-text fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                        <?php 
                                     $query = "SELECT * FROM post_comments";
                                     $select_all_comments = mysqli_query($connection,$query);
                                     $comments_counts = mysqli_num_rows( $select_all_comments);   

                                      echo   "<div class='huge'>{$comments_counts}</div>"
                                        
                                        
                                        ?>
                                            <!-- <div class="huge">20</div> -->
                                            <div>Comments</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="comments.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div> 
                                    </div>


                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-file-text fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">

                                        <?php 
                                     $query = "SELECT * FROM users";
                                     $select_all_users = mysqli_query($connection,$query);
                                     $users_counts = mysqli_num_rows( $select_all_users);   

                                      echo   "<div class='huge'>{$users_counts}</div>"
                                        
                                        
                                        ?>
                                            <!-- <div class="huge">20</div> -->
                                            <div>Users</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="users.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div> 
                                    </div>


                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-file-text fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">

                                        <?php 
                                     $query = "SELECT * FROM categories";
                                     $select_all_categories = mysqli_query($connection,$query);
                                     $categories_counts = mysqli_num_rows( $select_all_categories);   

                                      echo   "<div class='huge'>{$categories_counts}</div>"
                                        
                                        
                                        ?>
                                            <!-- <div class="huge">20</div> -->
                                            <div>Categories</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="categories.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div> 
                                    </div>


                                </a>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <!-- /.row -->
                <div class="row">



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
                
            </div>
            <!-- /.container-fluid -->
            <?php include "includes/navigation.php" ?>
        </div>



        <!-- /#page-wrapper -->
<?php include "includes/footer.php" ?>