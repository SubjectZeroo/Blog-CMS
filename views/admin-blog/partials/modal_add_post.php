<div class="modal" data-modal="testa" id="page-modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Crear Post</p>
            <button class="delete" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <form action="/add-post" method="POST" enctype="multipart/form-data">
                <div class="field">
                    <label class="label">Titulo Post</label>
                    <div class="control">
                        <input class="input" name="post_title" type="text" placeholder="Titulo Post">
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="post_tags">Post Tags</label>
                    <div class="control">
                        <input class="input" name="post_tags" type="text">
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
                    <textarea class="form-control" name="post_content" id="editorCreate" cols="30" rows="10"></textarea>
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
                                <option value="draft"> Draft </option>
                                <option value="published"> Publish </option>
                            </select>
                        </div>
                    </div>
                </div>          
            </section>
            <footer class="modal-card-foot">
                <button class="button is-success" name="create_post">Guardar Cambios</button>

            </footer>
        </form>
    </div>
</div>