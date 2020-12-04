<?php include "includes/header.php" ?>
<main class="main" id="wrapper">
  <?php insert_categories();?>
  <form action="" method="post">
    <div class="column">
        <div class="field">
          <label class="label" for="cat-title">Categories</label>
          <div class="control">
          <input class="input" type="text" name="cat_title">
          </div>
        
        </div>
        <div class="field">
          <input class="button is-success" type="submit" name="submit" value="Add Category">
        </div>
    </div>
  </form>
  <?php if(isset($_GET['edit'])) {
                $cat_id = $_GET['edit'];

                include "includes/update_categories.php";
              }
              ?>
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Category Title</th>
      </tr>
    </thead>
    <tbody>
      <?php findAllCategories(); ?>
      <?php deleteCategory();?>
    </tbody>
  </table>
</main>
<?php include "includes/footer.php" ?>