     <!-- Navigation -->
     <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
       <!-- Brand and toggle get grouped for better mobile display -->
       <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
           <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="index.html">CMS ADMIN</a>
       </div>
       <!-- Top Menu Items -->
       <ul class="nav navbar-right top-nav">
         <li> <a href="../index.php">Home</a></li>

         <!-- <span class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b
               class="caret"></b></a>
           <ul class="dropdown-menu message-dropdown">
             <li class="message-preview">
               <a href="#">
                 <div class="media">
                   <span class="pull-left">
                     <img class="media-object" src="http://placehold.it/50x50" alt="">
                   </span>
                   <div class="media-body">
                     <h5 class="media-heading">
                       <strong>John Smith</strong>
                     </h5>
                     <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                     <p>Lorem ipsum dolor sit amet, consectetur...</p>
                   </div>
                 </div>
               </a>
             </li>
             <li class="message-preview">
               <a href="#">
                 <div class="media">
                   <span class="pull-left">
                     <img class="media-object" src="http://placehold.it/50x50" alt="">
                   </span>
                   <div class="media-body">
                     <h5 class="media-heading">
                       <strong>John Smith</strong>
                     </h5>
                     <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                     <p>Lorem ipsum dolor sit amet, consectetur...</p>
                   </div>
                 </div>
               </a>
             </li>
             <span class="message-preview">
               <a href="#">
                 <div class="media">
                   <span class="pull-left">
                     <img class="media-object" src="http://placehold.it/50x50" alt="">
                   </span>
                   <div class="media-body">
                     <h5 class="media-heading">
                       <strong>John Smith</strong>
                     </h5>
                     <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                     <p>Lorem ipsum dolor sit amet, consectetur...</p>
                   </div>
                 </div>
               </a>
             </span>
             <li class="message-footer">
               <a href="#">Read All New Messages</a>
             </li>
           </ul>
         </span> -->

         <!-- <li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b
               class="caret"></b></a>
           <ul class="dropdown-menu alert-dropdown">
             <li>
               <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
             </li>
             <li>
               <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
             </li>
             <li>
               <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
             </li>
             <li>
               <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
             </li>
             <li>
               <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
             </li>
             <li>
               <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
             </li>
             <li class="divider"></li>
             <li>
               <a href="#">View All</a>
             </li>
           </ul>
         </li> -->

         <li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  
           <?php 
           if(isset($_SESSION['username'])){
              echo $_SESSION['username'];
           }
    
           
           
           ?>
           
           <b class="caret"></b></a>
           <ul class="dropdown-menu">
             <li>
               <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
             </li>
             <li class="divider"></li>
             <li>
               <a href="/admin/includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
             </li>
           </ul>
         </li>
       </ul>
       <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
       <div class="collapse navbar-collapse navbar-ex1-collapse">
         <ul class="nav navbar-nav side-nav">
           <li>
             <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
           </li>
           <li>
             <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-arrows-v"></i>
               Posts <i class="fa fa-fw fa-caret-down"></i></a>
             <ul id="posts_dropdown" class="collapse">
               <li>
                 <a href="posts.php">View All Posts</a>
               </li>
               <li>
                 <a href="posts.php?source=add_post">Add Post</a>
               </li>
             </ul>
           </li>
           <!-- <li>
             <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
           </li> -->
           <li>
             <a href="categories.php"><i class="fa fa-fw fa-wrench"></i> Categories</a>
           </li>
           
           <li class="active">
             <a href="comments.php"><i class="fa fa-fw fa-file"></i> Coments</a>
           </li>
           <!-- <li>
             <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> Users</a>
           </li> -->
           <li>
             <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i>
               Users <i class="fa fa-fw fa-caret-down"></i></a>
             <ul id="demo" class="collapse">
               <li>
                 <a href="users.php">View Users</a>
               </li>
               <li>
                 <a href="users.php?source=add_user">Add User</a>
               </li>
             </ul>

           </li>
           <li>
             <a href="profiles.php"><i class="fa fa-fw fa-dashboard"></i> Profiles</a>
           </li>
         </ul>
       </div>
       <!-- /.navbar-collapse -->
     </nav>


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