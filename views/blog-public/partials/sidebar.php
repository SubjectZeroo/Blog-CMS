<div class="tile is-parent sidebar p-5">  
    <div class="tile is-child">
        <div >
            <section>
                <h3 class="subtitle is-3">Articulos Destacados</h3>
                <ul>
                    <?php foreach ($postsRelevants as $postRelevant): ?>
                        <li class="is-flex mb-4">
                            <a href="" class="mr-3">
                                <figure class="image is-96x96">
                                    <img src="../../images/<?= $post->post_image ?>"  alt="">
                                </figure>
                            </a>
                            <div class="">
                                <a href="/post?p_id=<?= $postRelevant->post_id ?>">
                                    <h4><?= $postRelevant->post_title ?></h4>
                                </a>
                                <p class="has-text-grey-light small"> <?= $postRelevant->post_date ?></p>
                            </div>
                        </li>
                  <?php endforeach; ?>
                </ul>
            </section>
                <section id="categories" class="box">
                    <h3 class="subtitle is-3">Etiquetas</h3>
                    <ul class="">
                        <?php foreach ($categories as $category): ?>                
                                
                                        <li class="is-flex is-justify-content-space-between"> 
                                            <a href="/category?category=<?= $category->post_category_id ?>"><?= $category->category_title ?> 
                                            </a>
                                            <span class="u-small">(<?=  $category->categoryCount ?>)</span>
                                        </li>                             
                        <?php endforeach; ?>  
                    </ul>
                </section>                      
            </div>     

    </div>           
</div>
