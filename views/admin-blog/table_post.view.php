<?php require('partials/head-admin.php'); ?>
<?php require('partials/modal_add_post.php'); ?>
<div class="column is-12">
<header class="is-clearfix">
    <div>
        <h2>Tabla de Posts</h2>
        <!-- <small>Dashboard sdff sdfdsfdsf cvfvxgfd</small> -->
    </div>
    <hr>
    </hr>
</header>
  
  <div class="table-container">
    <button class="button modal-trigger mb-3  is-warning" data-modal="testa" id="button" >
                <span>Agregar Post</span>
    </button>
    <table class="table is-bordered is-striped is-fullwidth ">
      <div class="columns">    
      </div>
      <thead>
        <tr class="th is-selected">
          <th>#</th>
          <th> <abbr title="Id">Id</th>
          <th>Author</th>
          <th>Titulo</th>
          <th>Categoria</th>
          <th>Status</th>
          <!-- <th>Image</th> -->
          <th>Tags</th>
          <th>Fecha</th>
          <th>Acciones</th>

        </tr>
      </thead>
      <tbody>
        <?php foreach ($posts as $post): ?>
        <tr>
          <td>
            <input class='checkbox' id='selectAllBoxes' type='checkbox' name='checkBoxArray[]'
              value='<?= $post->post_id ?>'>
          </td>
          <td><?= $post->post_id  ?></td>
          <td><?= $post->username ?> </td>
          <td><?= $post->post_title  ?></td>
          <td><?= $post->category_title ?></td>
          <td><?= $post->post_status  ?></td>
          <td><?= $post->post_tags  ?></td>
          <td><?= $post->post_date ?></td>
          <td class="is-centered">
            <a href="/form-edit-post?p_id=<?= $post->post_id ?>">
              <i class="fas fa-edit has-text-success"></i>
            </a>
            <a  href='/post?p_id=<?= $post->post_id ?>'><i class="far fa-eye has-text-info"></i></a>
            <a onClick="javascript: return confirm('Are you sure yo want yo delete')"  href='/delete-post?delete=<?= $post->post_id ?>'> 
                <i class="fas fa-trash has-text-danger"></i>
            </a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  </form>
</div>
<script>

</script>
<?php require('partials/footer-admin.php'); ?>