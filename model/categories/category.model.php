<?php 
include_once('../config/connection.php');

Class Category extends Connection {
   
  private $Category_id;
  private $Category_title;


  
  public function getCategory_title(){
    return $this->Category_title;
}


public function setCategory_title($Category_title)
{
    $this->Category_title = $Category_title;
}
        public function getCategory_id(){
            return $this->Category_id;
        }


        public function setCategory_id($Category_id)
        {
            $this->Category_id = $Category_id;
        }

  public function showAllCategories(){
        try{
                
                $result = $this->sentence("SELECT * FROM categories");
            
                return $result;
           } catch(Exception $e) {
              echo $e;
      }
  }

  public function showCategoriesById($cat_id){
    try{
            
            $result = $this->sentence("SELECT * FROM categories WHERE category_id =  $cat_id ");
        
            return $result;
       } catch(Exception $e) {
          echo $e;
  }
}
  public function createCategory()
  {
      try {
          $result = $this->sentence("SET CHARACTER SET utf8");
          $result = $this->sentence("INSERT INTO categories(category_title) 
                                  VALUES( 
                                      '$this->Category_title'
                                      )");
          if ($result->rowCount() > 0)
          {
              return "exito";
          }
          else
          {
              return "fallo";
          }
      } catch (Exception $e) {
          echo $e;
      }
  }

  public function updateCategory()
  {
      try {
          $result = $this->sentence("SET CHARACTER SET utf8");
          $result = $this->sentence("UPDATE categories SET 
          category_title =  '$this->Category_title'
         
          
          WHERE category_id = '$this->Category_id'");
          if ($result->rowCount() > 0)
          {
              return "exito";
          }
          else
          {
              return "fallo";
          }
      } catch (Exception $e) {
          echo $e;
      }
  }
  
public function deleteCategory()
{
    try {
        $result = $this->sentence("SET CHARACTER SET utf8");
        $result = $this->sentence("DELETE FROM categories WHERE category_id =$this->Category_id");
        
        if ($result->rowCount() > 0)
        {
            return "exito";
        }
        else
        {
            return "fallo";
        }
      
    } catch (Exception $e) {
        echo $e;
    }
}

}
?>
 <?php 
                                // if(isset($_POST['update_category'])){
                                //   $the_cat_title = $_POST['cat_title'];

                                // $query = "UPDATE  categories SET  category_title = '$the_cat_title'  WHERE category_id = {$cat_id}";
                                // $update_query = mysqli_query($connection, $query);
                              

                                //   if(!$update_query) {
                                //     die("QUERY FAILED" . mysqli_error($connection));
                                //   }
                                // }
                          ?>