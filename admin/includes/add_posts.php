
<?php require_once ("../model/post/post.model.php"); ?>
<?php require_once ("../model/users/users.model.php"); ?>
<?php 
$Posts = new Post();
$CategoryPost = $Posts->showCategories();
$ListCategories = $CategoryPost->fetchAll(PDO::FETCH_ASSOC);

$Users = new User();
$User = $Users->showCategories();
$ListUsers = $User->fetchAll(PDO::FETCH_ASSOC);
?>
<h1 class="title">Create Post</h1>
<form action="/controller/createPost.controller.php?>" method="post" enctype="multipart/form-data">

    <div class="field">
        <label class="label" for="">Post Title</label>
        <div class="control">
            <input class="input" name="post_title" type="text">
        </div>

    </div>
    <!-- 
    <div class="form-group">
    <label for="">Post Category </label>
        <input class="form-control" name="post_category_id" type="text">
    </div> -->
    <div class="field">
    <label class="label" for="">Category</label>
        <div class="control">
            <div class="select">
                <select name="post_category" id="post_category">
                     <option value='0'>Seleccione</option>
                     <?php foreach ($ListCategories as $ListCategory): ?>
                      <option value='<?= $ListCategory['category_id'] ?>'><?= $ListCategory['category_title'] ?></option>"
                     <?php endforeach; ?> 
                </select>
            </div>
        </div>

    </div>
    <!-- <div class="field">
        <label class="label" for="">Post Author</label>
        <div class="control">
            <input class="input" name="post_author" type="text">
        </div>
    </div> -->
    <div class="field">
         <label class="label" for="">User</label>
        <div class="control">
            <div class="select">
                <select name="post_user" id="post_user">
                    <option value='0'>Seleccione</option>
                    <?php foreach ($ListUsers as $ListUser): ?>
                      <option value='<?= $ListUser['id'] ?>'><?= $ListUser['username'] ?></option>"
                     <?php endforeach; ?> 
                 
                </select>
            </div>
        </div>

    </div>
    <div class="field">
        <label class="label" for="">Post Status</label>
        <div class="select">
            <div class="control">
                <select name="post_status" id="">
                    <option value=""> Select Status </option>
                    <option value="draft"> Draft </option>
                    <option value="published"> Publish </option>
                </select>
            </div>
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
                Cargar Imagen...
            </span>
            </span>
        </label>
    </div>
    <div class="field">
        <label class="label" for="post_tags">Post Tags</label>
        <div class="control">
            <input class="input" name="post_tags" type="text">
        </div>
    </div>

    <div class="field">
        <label class="label" for="">Post Content</label>
        <textarea class="form-control" name="post_content" id="editor" cols="30" rows="10"></textarea>
    </div>

    <div class="control">
        <input class="button is-link" type="submit" name="create_post" value="Publish Post">
    </div>

</form>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>