<?php require_once ("../model/post/post.model.php"); ?>
<?php require_once ("../model/users/users.model.php"); ?>
<?php 
$Posts = new Post();
$PostById  = $Posts->showPostById($_GET['p_id']);
$ListsPostsById = $PostById->fetch(PDO::FETCH_ASSOC);

$CategoryPost = $Posts->showCategories();
$ListCategories = $CategoryPost->fetchAll(PDO::FETCH_ASSOC);



$Users = new User();
$User = $Users->showCategories();
$ListUsers = $User->fetchAll(PDO::FETCH_ASSOC);
?>
<h1>Edit Post</h1>
<form action="/controller/updatePost.controller.php?p_id=<?=$_GET['p_id']?>" method="post"
  enctype="multipart/form-data">
  <div class="field">
    <label class="label" for="">Post Title</label>
    <div class="control">
      <input class="input" value="<?= $ListsPostsById['post_title'] ?>" class="form-control" name="post_title"
        type="text">
    </div>
  </div>


  <div class="field">
    <div class="select">
      <select name="post_category" id="post_category">
        <option value='0'>Seleccione</option>
        <?php foreach ($ListCategories as $ListCategory): ?>
        <option value='<?= $ListCategory['category_id'] ?>'><?= $ListCategory['category_title'] ?></option>"
        <?php endforeach; ?>

      </select>
    </div>

  </div>
  <div class="field">
    <div class="control">
      <div class="select">
        <select name="post_user" id="post_user">
          <option value='0'>Seleccione</option>
          <!-- <option value='<?= $ListsPostsById['post_user'] ?>'><?= $ListsPostsById['post_user'] ?></option> -->
          <?php foreach ($ListUsers as $ListUser): ?>
          <option value='<?= $ListUser['id'] ?>'><?= $ListUser['username'] ?></option>"
          <?php endforeach; ?>

        </select>
      </div>
    </div>

  </div>
  <div class="field">
    <div class="select">
      <select name="post_status" id="">
        <option value="0">Eliga Uno</option>
        <?php
                    
                    if( $ListsPostsById['post_status'] == 'published'){
                      echo  "<option value='draft'>Draft</option>";
                    }else{
                      echo  "<option value='published'>Published</option>";
                    }
                    
                    ?>

      </select>
    </div>

  </div>
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
      <input class="input" value="<?=$ListsPostsById['post_tags'] ?>" class="form-control" name="post_tags" type="text">
    </div>
  </div>


  <div class="field">
    <label class="label" for="">Post Content</label>
    <textarea class="textarea" name="post_content" id="" cols="30"
      rows="10"> <?= $ListsPostsById['post_content'] ?></textarea>
  </div>

  <div class="form-group">
    <input class="button is-success" type="submit" name="update_post" value="Update Post">
  </div>
</form>