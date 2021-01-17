<?php

// if(isset($_POST['delete_post'])){
      $post_id = $_GET['delete'];
      App::get('database')->delete('posts','post_id',$post_id); 
      header("Location: /table-posts");
//   }
// require 'views/admin-blog/table_post.view.php';