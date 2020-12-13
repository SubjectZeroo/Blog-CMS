<?php include "includes/header.php" ?> 
<?php require_once ("../model/comments/comment.model.php"); ?>
<?php 
$Comment = new Comment();
$showAllCommentsByPost  = $Comment->showAllCommentsByPost($_GET['id']);
$ListAllCommentsByPosts = $showAllCommentsByPost->fetchAll(PDO::FETCH_ASSOC);
?>

<table class="table is-bordered is-striped is-fullwidth ">
  <thead>
    <tr>
      <th>Id</th>
      <th>Author</th>
      <th>Comment</th>
      <th>Email</th>
      <th>Status</th>
      <th>In Response to</th>
      <th>Date</th>
      <th>Aprove</th>
      <th>Unaprove</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>    
    <?php foreach ($ListAllCommentsByPosts as $ListAllCommentByPost): ?>                    
        <tr>
            <td><?= $ListAllCommentByPost['id'] ?> </td>
            <td><?= $ListAllCommentByPost['comment_author'] ?> </td>
            <td><?= $ListAllCommentByPost['comment_content'] ?></td>
            <td><?= $ListAllCommentByPost['comment_email'] ?></td> 
            <td><?= $ListAllCommentByPost['comment_status'] ?> </td>
            <td><?= $ListAllCommentByPost['post_title'] ?></td>              
            <td><?= $ListAllCommentByPost['comment_date'] ?> </td>  
            <td><a href='/controller/updateCommentApproved.controller.php?approved=<?=$ListAllCommentByPost['id'] ?>'>Approve</a></td>
            <td><a href='/controller/updateCommentUnapproved.controller.php?unapproved=<?= $ListAllCommentByPost['id'] ?>'>Unaprove</a></td>
            <td><a href='/controller/deleteComment.controller.php?delete=<?= $ListAllCommentByPost['id'] ?>'> Delete</a></td>
        </tr>
      <?php endforeach; ?> 
  </tbody>
</table>
<?php include "includes/footer.php" ?>