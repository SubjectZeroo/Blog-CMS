<?php require_once ("model/post/post.model.php"); ?>
<?php 
$Posts = new Post();
$CategoryPost = $Posts->showCategories();
$ListCategories = $CategoryPost->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="column is-3">  
            <?php include "widget.php"  ?>
            <div class="section-search my-3">
                <h4 class="title">Blog Search</h4>
                <form action="/search.view.php" method="POST">
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
                <?php foreach ($ListCategories as $ListCategory): ?>
                        <div class="content"><li> <a href="category.view.php?category=<?=$ListCategory['category_id']?>"><?= $ListCategory['category_title'] ?></a></li></div>
                <?php endforeach; ?>
                        </ul>
                    </div>   
                </div>                  
        </div>
        <!-- Side Widget Well -->
       
</div>
