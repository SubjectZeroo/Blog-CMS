<?php require_once ("../model/comments/comment.model.php"); ?>
<?php 
$Comment = new Comment();
$ShowAllComments  = $Comment->showAllComments();
$ListAllComments = $ShowAllComments->fetchAll(PDO::FETCH_ASSOC);
?>

<h1 class="title">Comments table</h1>
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
      <th>Aprove</th>
      <th>Unaprove</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>    
          <?php foreach ($ListAllComments as $ListAllComment): ?>
            <tr>
                <td><?= $ListAllComment['id'] ?></td> 
                <td><?= $ListAllComment['comment_author'] ?> </td> 
                <td><?= $ListAllComment['comment_content'] ?></td> 
                <td><?= $ListAllComment['comment_email'] ?></td>
                <td><?= $ListAllComment['comment_status'] ?></td>    
                <td><?= $ListAllComment['post_title'] ?></td> 
                <td><?= $ListAllComment['comment_date'] ?></td>
                <td><a href='/controller/updateCommentApproved.controller.php?approved=<?= $ListAllComment['id'] ?>'>Approve</a></td>
                <td><a href='/controller/updateCommentUnapproved.controller.php?unapproved=<?= $ListAllComment['id'] ?>'>Unaprove</a></td>
                <td><a href='/controller/deleteComment.controller.php?delete=<?= $ListAllComment['id'] ?>'> Delete</a></td>
            </tr>  
          <?php endforeach; ?>
                              
  </tbody>
</table>