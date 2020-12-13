<?php
require_once("../model/comments/comment.model.php");

$comment = new Comment();

if(isset($_GET['unapproved'])){

  $comment->setComment_id($_GET['unapproved']);
  

    $result = $comment->updateCommentUnapproved();

    if ($result == "exito")
    {
        echo "<script type='text/javascript'>
          alert('The comment was unapproved');
          window.location.href = '../admin/comments.php';
        </script>";
    }
    else
    {
        echo "<script type='text/javascript'>
          alert('An error has occurred, please try again');
          window.location.href = '../admin/comments.php';
        </script>";
    }


}

?>
