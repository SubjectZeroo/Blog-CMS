<?php
require_once("../model/categories/category.model.php");

$category = new Category();

if(isset($_GET['delete'])){
$category->setCategory_id($_GET["delete"] );
$result = $category->deleteCategory();

  if ($result == "exito")
    {
        echo "<script type='text/javascript'>
          alert('The category has been deleted');
          window.location.href = '../admin/categories.php';
        </script>";
    }
    else
    {
        echo "<script type='text/javascript'>
          alert('An error has occurred, please try again');
          window.location.href = '../admin/categories.php';
        </script>";
    }

}

?>
