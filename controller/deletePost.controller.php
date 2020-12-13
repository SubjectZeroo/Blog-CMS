<?php
require_once("../model/post/post.model.php");

$post = new Post();

if(isset($_GET['delete'])){
$post->setPost_id($_GET["delete"] );
$result = $post->deletePost();

var_dump($_GET);
  if ($result == "exito")
    {
        echo "<script type='text/javascript'>
          alert('Se ha actualizado el post correctamente');
          window.location.href = '../admin/posts.php';
        </script>";
    }
    else
    {
        echo "<script type='text/javascript'>
          alert('Ha ocurrido un error, por favor intente nuevamente');
          window.location.href = '../admin/posts.php';
        </script>";
    }

}

?>
