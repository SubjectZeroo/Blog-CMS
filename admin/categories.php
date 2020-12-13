<?php include "includes/header.php" ?>
<?php require_once ("../model/categories/category.model.php"); ?>
<?php 
$Category = new Category();
$ShowAllCategories  = $Category->showAllCategories();
$ListAllCategories = $ShowAllCategories->fetchAll(PDO::FETCH_ASSOC);

?>
  <form action="/controller/createCategory.controller.php" method="post">
    <div class="column">
        <div class="field">
          <label class="label" for="cat-title">Categories</label>
          <div class="control">
          <input class="input" type="text" name="cat_title">
          </div>
        
        </div>
        <div class="field">
          <input class="button is-success" type="submit" name="create_category" value="Add Category">
        </div>
    </div>
  </form>
  <?php if(isset($_GET['edit'])) {
              $ShowCategoriesById  = $Category->showCategoriesById($_GET['edit']);
              $ListCategoriesById = $ShowCategoriesById->fetch(PDO::FETCH_ASSOC);
  ?>
                  <form action="/controller/updateCategory.controller.php?update_category=<?=$_GET['edit'] ?>" method="post">
                    <div class="form-group">
                      <div class="column">
                        <div class="field">
                          <label class="label" for="cat-title"> Edit Categories</label>                       
                                  <div class="control">
                                    <input value="<?php if(isset($ListCategoriesById['category_title'])){ echo$ListCategoriesById['category_title']; } ?>" class="input" type="text" name="cat_title">
                                  </div>                
                        </div>
                        <div class="field">
                          <input class="button is-success" type="submit" name="update_category" value="Update Category">                
                        </div>
                      </div>
                      
                    </div>
                  </form>
  <?php             
  }      
  ?>
  <table class="table is-bordered is-striped is-fullwidth">
    <thead>
      <tr>
        <th>Id</th>
        <th>Category Title</th>
        <th>Delete</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($ListAllCategories  as $ListAllCategory ): ?>
      <tr>
       <td><?= $ListAllCategory['category_id'] ?></td>
       <td><?= $ListAllCategory['category_title'] ?></td>
       <td><a href='/controller/deleteCategory.controller.php?delete=<?= $ListAllCategory['category_id'] ?>'>Delete</a></td>
       <td><a href='categories.php?edit=<?= $ListAllCategory['category_id'] ?>'>Edit</a></td>
      </tr>
     <?php endforeach; ?>
    </tbody>
  </table>
<?php include "includes/footer.php" ?>