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
<div class="">
  <form action="" method="post">
    <table class="table is-responsive">
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
        <tr>
          <th></th>
          <th> <abbr title="Id">Id</th>
          <!-- <th>Author</th> -->
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
        <?php 
                                  $query = "SELECT * FROM posts";
                                  $select_posts = mysqli_query($connection, $query);
                            
                            
                                  while($row = mysqli_fetch_assoc(  $select_posts)) {
                                    $post_id = $row['post_id'];
                                    $post_author = $row['post_author'];
                                    $post_user = $row['post_user'];
                                    $post_title = $row['post_title'];
                                    $post_category_id = $row['post_category_id'];
                                    $post_status = $row['post_status'];
                                    // $post_image = $row['post_image'];
                                    $post_tags = $row['post_tags'];
                                    $post_comment_count = $row['post_comment_count'];
                                    $post_date = $row['post_date'];
                              
                                      echo "<tr>";
                                      ?>
        <td><input class='checkbox' id='selectAllBoxes' type='checkbox' name='checkBoxArray[]'
            value='<?php echo $post_id ?>'></td>
        <?php
                                      
                                      echo "<td>$post_id</td> ";


                                      // if( empty($post_author)){

                                      //   echo "<td>$post_author </td> ";

                                      // } else if(empty($post_user)) {

                                      //   echo "<td>$post_user </td> ";

                                      // }

                                      echo "<td>$post_user </td> ";



                                      echo "<td>$post_title</td> ";

                                  $query = "SELECT * FROM categories WHERE category_id =  {$post_category_id}";
                                      $select_categories_id = mysqli_query($connection, $query);
                        
                                        while($row = mysqli_fetch_assoc( $select_categories_id)) {
                                              $cat_id = $row['category_id'];
                                                $cat_title = $row['category_title'];
                                          

                                      echo "<td>{$cat_title}</td> ";
                                    }


                                      echo "<td>$post_status </td> ";
                                      // echo "<td>$post_image </td> ";
                                      echo "<td>$post_tags </td> ";


                                    $query = "SELECT * FROM post_comments WHERE comment_post_id = $post_id";
                                    $send_comment_query = mysqli_query($connection, $query);

                                    $row = mysqli_fetch_array($send_comment_query);
                                    if(isset($row['id'])){
                                      $comment_id = $row['id'];
                                    }
                                    

                                    $count_comments = mysqli_num_rows($send_comment_query);

                                      echo "<td> <a href='post_comments.php?id=$post_id'> $count_comments </a></td> ";


                                      echo "<td> $post_date</td> ";
                                      echo "<td><a onClick=\"javascript: return confirm('Are you sure yo want yo delete'); \" href='posts.php?delete={$post_id}'> Delete</a></td> ";
                                      echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td> ";
                                      echo "<td><a href='/post.php?p_id={$post_id}'>View</a></td> ";
                                      echo "</tr>";
                                  }

                                  ?>
      </tbody>
    </table>
  </form>
</div>

<?php 
          if(isset($_GET['delete'])) {
              $the_post_id = $_GET['delete'];
              $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
              $delete_query = mysqli_query($connection, $query);
          }                      
?>