<div class="modal" data-modal="testc" id="page-modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Crear Categorias</p>
            <button class="delete" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <form action="/add-category" method="POST" enctype="multipart/form-data">
                <div class="field">
                    <label class="label">Categoria</label>
                    <div class="control">
                        <input class="input" name="category_title" type="text" placeholder="Titulo Categoria">
                    </div>
                </div>               
            </section>
            <footer class="modal-card-foot">
                <button class="button is-success" name="create_category">Guardar Cambios</button>
            </footer>
        </form>
    </div>
</div>