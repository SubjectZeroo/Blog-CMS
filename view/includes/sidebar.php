<?php require_once ("model/post/post.model.php"); ?>
<?php 
$Posts = new Post();
$CategoryPost = $Posts->showCategories();
$ListCategories = $CategoryPost->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="tile is-parent sidebar p-6">  
    <div class="tile is-child">
        <div >
                <section id="categories" class="box">
                    <h3 class="subtitle is-3">Etiquetas</h3>
                    <?php foreach ($ListCategories as $ListCategory): ?>                
                                <ul class="">
                                    <li class="is-flex is-justify-content-space-between"> 
                                        <a href="category.view.php?category=<?=$ListCategory['category_id']?>"><?= $ListCategory['category_title'] ?> 
                                        </a>
                                        <span class="u-small">(1)</span>
                                    </li>
                                </ul>
                            
                    <?php endforeach; ?>  
                </section>                      
            </div>     

    </div>           
</div>
