<?php
require_once("../model/categories/category.model.php");

$category = new Category();

if(isset($_POST['create_category'])){

 
  $category->setCategory_title($_POST['cat_title']);
  

    $result = $category->createCategory();

    if ($result == "exito")
    {
        echo "<script type='text/javascript'>
          alert('Se ha guardado correctamente');
          window.location.href = '../admin/categories.php';
        </script>";
    }
    else
    {
        echo "<script type='text/javascript'>
          alert('Ha ocurrido un error, por favor intente nuevamente');
          window.location.href = '../admin/categories.php';
        </script>";
    }


}

?>
