<?php require('partials/head-admin.php'); ?>


<header class="is-clearfix">
    <div>
        <h2>Tabla de Comentarios</h2>
        <!-- <small>Dashboard sdff sdfdsfdsf cvfvxgfd</small> -->
    </div>
    <hr>
    </hr>
</header>
<table class="table is-bordered is-striped is-fullwidth">
  <thead>
    <tr>
      <th>Id</th>
      <th>Author</th>
      <th>Comentario</th>
      <th>Email</th>
      <th>Status</th>
      <th>Respondido</th>
      <th>Fecha</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>    
          <?php foreach ($comments as $comment): ?>
            <tr>
                <td><?= $comment->id ?></td> 
                <td><?= $comment->comment_author ?> </td> 
                <td><?= $comment->comment_content ?></td> 
                <td><?= $comment->comment_email ?></td>
                <td><?= $comment->comment_status ?></td>    
                <td><?= $comment->post_title ?></td> 
                <td><?= $comment->comment_date ?></td>
                <td><a href='/update-comment?approved=<?= $comment->id ?>&name=approved'><i class="far fa-thumbs-up has-text-success"></i></a>
                <a href='/update-comment?unapproved=<?= $comment->id ?>&name=unapproved'><i class="far fa-thumbs-down has-text-warning"></i></a>
                <a href='/delete-comment?delete=<?= $comment->id ?>'> <i  class="fas fa-trash has-text-danger"></i></a></td>
            </tr>  
          <?php endforeach; ?>                              
  </tbody>
</table>
<?php require('partials/footer-admin.php'); ?>