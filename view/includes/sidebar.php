<?php require_once ("model/post/post.model.php"); ?>
<?php 
$Posts = new Post();
$CategoryPost = $Posts->showCategories();
$ShowRelevantPost = $Posts->getPostWithComments();
$ListCategories = $CategoryPost->fetchAll(PDO::FETCH_ASSOC);
$ListPostRelevants = $ShowRelevantPost->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="tile is-parent sidebar p-5">  
    <div class="tile is-child">
        <div >
            <section>
                <h3 class="subtitle is-3">Articulos Destacados</h3>

                <ul>
                    <?php foreach ($ListPostRelevants as $ListPostRelevant): ?>
                        <li class="is-flex mb-4">
                            <a href="" class="mr-3">
                                <figure class="image is-96x96">
                                    <img src="https://bulma.io/images/placeholders/64x64.png" alt="">
                                </figure>
                            </a>
                            <div class="">
                                <a href="">
                                    <h4><?=  $ListPostRelevant['post_title'] ?></h4>
                                </a>
                                <p class="has-text-grey-light small"> <?=  $ListPostRelevant['post_date'] ?></p>
                            </div>
                        </li>
                  <?php endforeach; ?>
                </ul>
            </section>
                <section id="categories" class="box">
                    <h3 class="subtitle is-3">Etiquetas</h3>
                    <ul class="">
                        <?php foreach ($ListCategories as $ListCategory): ?>                
                                
                                        <li class="is-flex is-justify-content-space-between"> 
                                            <a href="category.view.php?category=<?=$ListCategory['category_id']?>"><?= $ListCategory['category_title'] ?> 
                                            </a>
                                            <span class="u-small">(1)</span>
                                        </li>
                                
                                
                        <?php endforeach; ?>  
                    </ul>
                </section>                      
            </div>     

    </div>           
</div>
