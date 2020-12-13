<?php require_once  '../config/app.php'; ?>
<?php
require_once("../model/post/post.model.php");

$post = new Post();

if(isset($_POST['create_post'])){

 
  $post->setPost_category_id($_POST['post_category']);
  $post->setPost_title($_POST["post_title"]);
  $post->setPost_user($_POST["post_user"]);
  $post->setPost_status($_POST["post_status"]);
  $post->setPost_image($_FILES['image']['name']);
  $post->setPost_tags($_POST["post_tags"]);
  $post->setPost_date(date('d-m-y'));
  $post->setPost_content($_POST["post_content"]);

  $post_image_temp = $post->setPost_image($_FILES['image']['name']);
  $post_image = $post->setPost_image($_FILES['image']['name']);
  move_uploaded_file($post_image_temp, "../images/$post_image");


      //Agregar nuevo usuario
    $result = $post->createPost();

    if ($result == "exito")
    {
        echo "<script type='text/javascript'>
          alert('Se ha guardado correctamente');
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
