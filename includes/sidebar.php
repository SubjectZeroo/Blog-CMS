<div class="column is-3">  
            <?php include "widget.php"  ?>
            <div class="section-search my-3">
                <h4 class="title">Blog Search</h4>
                <form action="search.php" method="POST">
                    <div class="control">
                        <div class="field has-addons">
                            <div class="control">
                                <input name="search" type="text" class="input">
                            </div>
                            <div class="control">
                                <button name="submit" class="btn button is-info" type="submit">
                                    Buscar
                                </button>
                            </div>
                        </div>
                    
                    </div>
                </form>       
            </div>
           
        
        <!-- 
        <div class="well">
            <h4>Login</h4>
            <form action="includes/login.php" method="POST">
            <div class="form-group">
                <input name="username" type="text" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <input name="password" type="password" class="form-control" placeholder="Enter password">

                <span class="input-group-btn">
                    <button class="btn btn-primary" name="login" type="submit">
                    Submit     
                    </button>
                </span>
            </div>
            </form>
        
        </div> -->
        <div class="well">
            <?php   
                $query = "SELECT * FROM categories";
                $select_categories_sidebar = mysqli_query($connection, $query);
            ?>
                <h4 class="title is-3">Blog Categories</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled">


                        <?php 
                        while($row = mysqli_fetch_assoc( $select_categories_sidebar)) {
                        $cat_title = $row['category_title'];
                        $cat_id = $row['category_id'];

                        echo "<div class='content'><li> <a href='category.php?category=$cat_id'>{$cat_title}</a></li></div>";
                        }
                        
                        
                        ?>
                
                        </ul>
                    </div>   
                </div>                  
        </div>
        <!-- Side Widget Well -->
       
</div>
