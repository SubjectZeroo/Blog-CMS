<?php require('partials/head-admin.php'); ?>


<h1 class="title">Comentarios Enviados</h1>
<table class="table is-bordered is-striped is-fullwidth">
  <thead>
    <tr>
      <th>Id</th>
      <th>Author</th>
      <th>Comment</th>
      <th>Email</th>
      <th>Status</th>
      <th>In Response to</th>
      <th>Date</th>
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
                <td><a href='/controller/updateCommentApproved.controller.php?approved=<?= $comment->id ?>'><i class="far fa-thumbs-up has-text-success"></i></a>
                <a href='/controller/updateCommentUnapproved.controller.php?unapproved=<?= $comment->id ?>'><i class="far fa-thumbs-down has-text-warning"></i></a>
                <a href='/controller/deleteComment.controller.php?delete=<?= $comment->id ?>'> <i  class="fas fa-trash has-text-danger"></i></a></td>
            </tr>  
          <?php endforeach; ?>                              
  </tbody>
</table>
<?php require('partials/footer-admin.php'); ?>