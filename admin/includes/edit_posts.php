<?php 

  if(isset($_GET['p_id'])){

    $the_post_id =  $_GET['p_id'];

  }

  $query = "SELECT * FROM posts WHERE post_id =  $the_post_id";
  $select_posts_by_id = mysqli_query($connection, $query);


  while($row = mysqli_fetch_assoc($select_posts_by_id)) {
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_content = $row['post_content'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];
  }

if(isset($_POST['update_post'])) {

  $post_title = $_POST['post_title'];
  $post_author = $_POST['post_author'];
  $post_category_id = $_POST['post_category'];
  $post_status = $_POST['post_status'];
  $post_image = $_FILES['image']['name'];
  $post_image_temp = $_FILES['image']['name'];
  $post_tags =  $_POST['post_tags'];
  $post_content = $_POST['post_content'];
  

  move_uploaded_file($post_image_temp, "../images/$post_image");
  
if(empty($post_image)) {
  $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
  $select_image = mysqli_query($connection,$query);

  while($row = mysqli_fetch_array($select_image)) {
    $post_image = $row['post_image'];
  }
}
  
  $query = "UPDATE  posts SET "; 
  $query .="post_title=  '{$post_title}',";
  $query .="post_category_id= '{$post_category_id}',"; 
  $query .="post_date=  now(),";     
  $query .="post_author=  '{$post_author}',";              
  $query .="post_status=   '{$post_status}',";   
  $query .="post_tags=   '{$post_tags}',"; 
  $query .="post_content=  '{$post_content}',"; 
  $query .="post_image=  '{$post_image}'"; 
  $query .="WHERE post_id=  {$the_post_id}";                     
         
  
  $update_post = mysqli_query($connection,$query);

  if(!$update_post) {
    die("QUERY FAILED" . mysqli_error($connection));
  }

  echo "Post Update";
  echo "<p class='bg-success'> Post Updated. <a href='../post.php?p_id={$the_post_id}'> View Post</a> <a href='../post.php'> Edit More Post</a> </p>";
}

?>


<form action="" method="post" enctype="multipart/form-data">

  <div class="field">
    <label class="label" for="">Post Title</label>
    <div class="control">
      <input class="input" value="<?php echo $post_title ?>" class="form-control" name="post_title" type="text">
    </div>
  </div>


  <div class="field">
    <div class="select">
      <select name="post_category" id="post_category">
        <?php 
  
  $query = "SELECT * FROM categories ";
  $select_categories = mysqli_query($connection, $query);

                  while($row = mysqli_fetch_assoc($select_categories)) {
                        $cat_id = $row['category_id'];
                        $cat_title = $row['category_title'];

                          echo "<option value='{$cat_id}'>{$cat_title}</option>";
                  }
  
  ?>
        <option value='0'>Seleccione</option>
      </select>
    </div>

  </div>


  <div class="field">
    <label class="label" for="">Post Author</label>
    <div class="control">
      <input class="input" value="<?php echo $post_author ?>" class="form-control" name="post_author" type="text">
    </div>
  </div>
  <div class="field">
    <div class="select">
      <select name="post_status" id="">
        <option value="0">Eliga Uno</option>
        <?php
                  
                  if($post_status == 'published'){
                    echo  "<option value='draft'>Draft</option>";
                  }else{
                    echo  "<option value='published'>Published</option>";
                  }
                  
                  ?>

      </select>
    </div>

  </div>
  <!-- 
<div class="form-group">
  <label for="">Post Status</label>
    <input value="<?php echo $post_status ?>" class="form-control" name="post_status" type="text">
</div> -->
  <!-- 
  <div class="form-group">
    <label for="image">Post Image</label>
    <input class="form-control" name="image" type="file">
  </div> -->
    <div class="file">
      <label class="file-label">
        <input class="file-input" type="file" name="image">
        <span class="file-cta">
          <span class="file-icon">
            <i class="fas fa-upload"></i>
          </span>
          <span class="file-label">
            Choose a file…
          </span>
        </span>
      </label>
    </div>
    <div class="field">
      <label class="label" for="">Post Tags</label>
      <div class="control">
        <input class="input" value="<?php echo $post_tags ?>" class="form-control" name="post_tags" type="text">
      </div>
    </div>


    <div class="field">
      <label class="label" for="">Post Content</label>
      <textarea class="textarea" name="post_content" id="" cols="30"
        rows="10"> <?php echo  $post_content ?></textarea>
    </div>

    <div class="form-group">
      <input class="button is-success" type="submit" name="update_post" value="Update Post">
    </div>

</form>