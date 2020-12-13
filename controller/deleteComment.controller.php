<?php require_once  '../config/app.php'; ?>
<?php
require_once("../model/comments/comment.model.php");

$comment = new Comment();

if(isset($_GET['delete'])){
$comment->setComment_id($_GET["delete"] );
$result = $comment->deleteComment();

  if ($result == "exito")
    {
        echo "<script type='text/javascript'>
          alert('The comment has been deleted');
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
