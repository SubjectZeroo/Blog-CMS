<?php
require_once("../model/post/post.model.php");
$post = new Post();
if(isset($_POST['checkBoxArray'])){ 
  foreach($_POST['checkBoxArray'] as $postValueId){
     $bulk_options = $_POST['bulk_options'];

    switch( $bulk_options){
      case 'published':
        // $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId}";
        // $update_to_published_status = mysqli_query($connection, $query);
        $post->updatePostStatus($bulk_options, $postValueId);
        header('Location: ../admin/posts.php');
      break;
      case 'draft':
        // $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId}";
        // $update_to_draft_status = mysqli_query($connection, $query);
        $post->updatePostStatus($bulk_options, $postValueId);
        header('Location: ../admin/posts.php');
      break;
      case 'delete':
        // $query = "DELETE FROM posts  WHERE post_id = {$postValueId}";
        // $update_to_delete_status = mysqli_query($connection, $query);
        $post->setPost_id($postValueId);
        $post->deletePost();
        header('Location: ../admin/posts.php');
      break;
    }
  }
}

?>