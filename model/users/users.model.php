<?php 
include_once('../config/connection.php');

Class User extends Connection {
   
  public function showCategories(){
        try{
                
                $result = $this->sentence("SELECT * FROM users");
            
                return $result;
           } catch(Exception $e) {
              echo $e;
      }
  }


}
?>
