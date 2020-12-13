<?php 
include_once('../config/connection.php');




Class Comment extends Connection {
   
  private $Comment_id;

  public function getComment_id()
        {
            return $this->Comment_id;
        }


        public function setComment_id($Comment_id)
        {
            $this->Comment_id = $Comment_id;
        }

  public function showAllComments(){
        try{
                
                $result = $this->sentence("SELECT * FROM post_comments PC INNER JOIN posts P ON P.post_id = PC.comment_post_id");
            
                return $result;
           } catch(Exception $e) {
              echo $e;
      }
  }
  public function updateCommentApproved(){
      try {
          $result = $this->sentence("SET CHARACTER SET utf8");
          $result = $this->sentence("UPDATE post_comments SET comment_status = 'approved' WHERE id =  $this->Comment_id");
          
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

  public function updateCommentUnapproved(){
    try {
        $result = $this->sentence("SET CHARACTER SET utf8");
        $result = $this->sentence("UPDATE post_comments SET comment_status = 'unapproved' WHERE id = $this->Comment_id");
        
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

public function deleteComment()
{
    try {
        $result = $this->sentence("SET CHARACTER SET utf8");
        $result = $this->sentence("DELETE FROM post_comments WHERE id = $this->Comment_id");
        
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
