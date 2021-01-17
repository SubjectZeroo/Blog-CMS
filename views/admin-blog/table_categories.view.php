<?php require('partials/head-admin.php'); ?>
<?php require('partials/moda_add_categorias.php'); ?>
<header class="is-clearfix">
    <div>
        <h2>Tabla de Categorias</h2>
        <!-- <small>Dashboard sdff sdfdsfdsf cvfvxgfd</small> -->
    </div>
    <hr>
    </hr>
</header>
<button class="button modal-trigger mb-3" data-modal="testc" id="button" >
                <span>Agregar Categorias</span>
</button>
<table class="table is-bordered is-striped is-fullwidth">
    <thead>
        <tr>
            <th>Id</th>
            <th>Categoria</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories  as $category ): ?>
        <tr>
            <td><?= $category->category_id ?></td>
            <td><?= $category->category_title ?></td>
           <td> <a href='/delete-category?delete=<?= $category->category_id  ?>'> <i  class="fas fa-trash has-text-danger"></i></a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php require('partials/footer-admin.php'); ?>