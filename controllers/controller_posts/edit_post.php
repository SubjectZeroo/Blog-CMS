<?php

if(isset($_POST['update_post'])){

  $post_id =    $_GET['p_id'];
  $title =      $_POST['post_title'];
  $tags =       $_POST['post_tags'];
  $content =    $_POST['post_content'];
  $status =     $_POST['post_status'];
  $category =   $_POST['post_category'];


  App::get('database')->updatePost($title,$tags,$content,$status,$category, $post_id);      


}


require 'views/admin-blog/table_post.view.php';





