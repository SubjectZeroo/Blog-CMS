<?php require_once ("../model/post/post.model.php"); ?>
<?php 
$Posts = new Post();
$ShowAllPost  = $Posts->showAllPost();
$ListAllPost = $ShowAllPost->fetchAll(PDO::FETCH_ASSOC);
?>
<?php
if(isset($_POST['checkBoxArray'])){
 
  foreach($_POST['checkBoxArray'] as $postValueId){
     $bulk_options = $_POST['bulk_options'];

    switch( $bulk_options){
      case 'published':
        $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId}";

        $update_to_published_status = mysqli_query($connection, $query);
      break;
      case 'draft':
        $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId}";
  
        $update_to_draft_status = mysqli_query($connection, $query);
      break;
      case 'delete':
        $query = "DELETE FROM posts  WHERE post_id = {$postValueId}";
  
        $update_to_delete_status = mysqli_query($connection, $query);
      break;
    }
  }
}

?>
<div class="column is-12">
  <h1 class="title">Post Table</h1>
  <form action="" method="post">
    <table class="table is-bordered is-striped is-fullwidth ">
      <div class="columns">
        <div id="bulkOptionsContainer" class="column is-2">
          <div class="select">
            <select class="" name="bulk_options" id="">
              <option value="">Select Options</option>
              <option value="published">Publish</option>
              <option value="draft">Draft</option>
              <option value="delete">Delete</option>
            </select>
          </div>
        </div>
        <div class="column is-3">
          <input type="submit" name="submit" class="button is-primary" value="Apply">
          <a href="add_post.php" class="button is-success">Add New</a>
        </div>
      </div>
      <thead>
        <tr class="th is-selected">
          <th>#</th>
          <th> <abbr title="Id">Id</th>
          <th>Users</th>
          <th>Title</th>
          <th>Category</th>
          <th>Status</th>
          <!-- <th>Image</th> -->
          <th>Tags</th>
          <th>Comments</th>
          <th>Date</th>
          <th>Delete</th>
          <th>Edit</th>
          <th>View</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($ListAllPost as $ListAllPosts): ?>
        <tr>
          <td><input class='checkbox' id='selectAllBoxes' type='checkbox' name='checkBoxArray[]'
              value='<?= $ListAllPosts['post_id'] ?>'></td>
          <td><?= $ListAllPosts['post_id']  ?></td>
          <td><?= $ListAllPosts['username']  ?> </td>
          <td><?= $ListAllPosts['post_title']  ?></td>
          <td><?=  $ListAllPosts['category_title'] ?></td>
          <td><?= $ListAllPosts['post_status']  ?></td>
          <td><?= $ListAllPosts['post_tags']  ?></td>
          <?php
              $ShowCommentByPost  = $Posts->showCommentByPostId($ListAllPosts['post_id']);
              $ListCommentByPost = $ShowCommentByPost->fetchAll();
          ?>
          <?php foreach ($ListCommentByPost as $ListCommentsByPosts): ?>
          <td> <a href='post_comments.php?id=<?=$ListAllPosts['post_id'] ?>'><?=  $ListCommentsByPosts['total']?></a>
          </td>
          <?php endforeach; ?>
          <td><?=$ListAllPosts['post_date']?></td>
          <td><a onClick="javascript: return confirm('Are you sure yo want yo delete')"
              href='/controller/deletePost.controller.php?delete=<?= $ListAllPosts['post_id'] ?>'> Delete</a></td>
          <td><a href='posts.php?source=edit_post&p_id=<?= $ListAllPosts['post_id'] ?>'>Edit</a></td>
          <td><a href='/post.php?p_id=<?= $ListAllPosts['post_id'] ?>'>View</a></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </form>
</div>