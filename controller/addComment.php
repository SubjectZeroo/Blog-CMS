<?php require_once  '../config/app.php'; ?>
<?php
require_once("../model/post/post.model.php");

$post = new Post();

if(isset($_POST['create_comment'])){

  // $the_post_id = $_GET['p_id'];
  $post->setPost_comment_id($_GET['p_id']);
  $post->setPost_comment_author($_POST["comment_author"]);
  $post->setPost_comment_Email($_POST["comment_email"]);
  $post->setComment_content($_POST["comment_content"]);
  
      //Agregar nuevo usuario
    $result = $post->addCommentPost();

    if ($result == "exito")
    {
        echo "<script type='text/javascript'>
          alert('Se ha guardado correctamente');
          window.location.href = '../post.php?p_id={$_GET['p_id']}';
        </script>";
    }
    else
    {
        echo "<script type='text/javascript'>
          alert('Ha ocurrido un error, por favor intente nuevamente');
          window.location.href = '../post.php?p_id={$_GET['p_id']}';
        </script>";
    }


}

?>
