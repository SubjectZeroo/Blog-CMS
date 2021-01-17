
<?php require('partials/head-admin.php'); ?>
<form action="/edit-post?p_id=<?=$post['post_id']?>" method="POST" enctype="multipart/form-data">
    <div class="field">
        <label class="label">Titulo Post</label>
        <div class="control">
            <input class="input" name="post_title" type="text" placeholder="Titulo Post" value="<?= $post['post_title'] ?>"  >
        </div>
    </div>
    <div class="field">
        <label class="label" for="post_tags">Post Tags</label>
        <div class="control">
            <input class="input" name="post_tags" type="text" value="<?= $post['post_tags'] ?>">
        </div>
    </div>
    <div class="field">
        <label class="label" for="">Category</label>
        <div class="control">
            <div class="select">
                <select name="post_category" id="post_category">
                <option value='0'>Seleccione</option>
                <?php foreach ($categories as $category): ?>                  
                    <option value="<?= $category->category_id ?>"> <?= $category->category_title ?></option>
                <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    <div class="field">
        <label class="label" for="">Post Content</label>
        <textarea class="form-control" name="post_content" id="editorEdit" cols="30" rows="10"><?= $post['post_content'] ?></textarea>
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
        <label class="label" for="">Post Status</label>
        <div class="select">
            <div class="control">
                <select name="post_status" id="">
                    <option value=""> Select Status </option>
                    <option value="Borrador"> Draft </option>
                    <option value="Publicado"> Publish </option>
                </select>
            </div>
        </div>
    </div>
    <button class="button is-success" name="update_post">Actualizar Cambios</button>
</form>
<?php require('partials/footer-admin.php'); ?>