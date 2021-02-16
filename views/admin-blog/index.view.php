<?php require('partials/head-admin.php'); ?>
<header class="is-clearfix">
    <div>
        <h2>Dashboard</h2>
        <small>Bienvenido al sistema</small>
        <?=  $_SESSION['username'] ;
        ?>
    </div>
    <hr>
    </hr>
</header>
<div class="tile is-ancestor ">
    <div class="tile is-parent">
        <article class="tile is-child box has-background-danger">
            <div class="media has-text-white ">
                <div class="media-left">
                    <i class="fas fa-file fa-3x"></i>
                </div>
                <div class="media-content">
                    <div class="content ">
                        <div class='title  has-text-white '><?= $posts ?></div>
                        <h2 class="subtitle  has-text-white ">Posts</h2>
                    </div>
                    <nav class="level is-mobile">
                        <div class="level-left">
                            <a class="level-item has-text-white " aria-label="reply" href="/table-posts">
                                <span class="mr-2">Ver Detalles</span>
                                <span class=""><i class="fa fa-arrow-circle-right"></i></span>
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
            
        </article>
    </div>
    <div class="tile is-parent">
        <div class="tile is-child box  has-background-warning">
            <div class="media has-text-white ">
                <div class="media-left">
                    <i class="fas fa-comments fa-3x"></i>
                </div>
                <div class="media-content">
                    <div class="content ">
                        <div class='title has-text-white'><?= $comments ?></div>
                        <h2 class="subtitle  has-text-white ">Comentarios</h2>
                    </div>
                    <nav class="level is-mobile">
                        <div class="level-left">
                            <a class="level-item has-text-white " aria-label="reply" href="/table-comments">
                                <span class="mr-2">Ver Detalles</span>
                                <span class=""><i class="fa fa-arrow-circle-right"></i></span>
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="tile is-parent">
        <div class="tile is-child box  has-background-success">
            <div class="media has-text-white ">
                <div class="media-left">
                    <i class="fas fa-users fa-3x"></i>
                </div>
                <div class="media-content">
                    <div class="content ">
                        <div class="title  has-text-white"><?= $users ?></div>
                        <h2 class="subtitle  has-text-white ">Usuarios</h2>
                    </div>
                    <nav class="level is-mobile">
                        <div class="level-left">
                            <a class="level-item has-text-white " aria-label="reply" href="./posts.php">
                                <span class="mr-2">Ver Detalles</span>
                                <span class=""><i class="fa fa-arrow-circle-right"></i></span>
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div> -->
    <div class="tile is-parent">
        <div class="tile is-child box  has-background-info">
            <div class="media has-text-white ">
                <div class="media-left">
                    <i class="fas fa-boxes fa-3x"></i>
                </div>
                <div class="media-content">
                    <div class="content ">
                        <div class='title   has-text-white'><?= $categories ?></div>
                        <h2 class="subtitle  has-text-white ">Categorias</h2>
                    </div>
                    <nav class="level is-mobile">
                        <div class="level-left">
                            <a class="level-item has-text-white " aria-label="reply" href="/table-categories">
                                <span class="mr-2">Ver Detalles</span>
                                <span class=""><i class="fa fa-arrow-circle-right"></i></span>
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<header class="is-clearfix">
    <div>
        <h2>Estadisticas</h2>
    </div>
    <hr>
    </hr>
</header>
<script type="text/javascript">
                    google.charts.load('current', {'packages':['bar']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                        ['Date', 'Count'],

                        <?php 
                        $element_text = ['Posts ','Comentarios','Categorias'];
                        
                        $element_count = [$posts, $comments, $categories];
                        
                        for($i = 0; $i < 3; $i++) {

                            echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";


                        }

                        ?>
                    
                      
                    
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


<?php require('partials/footer-admin.php'); ?>