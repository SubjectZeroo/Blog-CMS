<?php 
include_once('connection.php');

Class Post extends Connection {
  private $Postid;
  private $Post_category_id;
  private $Post_title;
  private $Post_author;
  private $Post_user;
  private $Post_date;
  private $Post_image;
  private $Post_content;
  private $Post_tags;
  private $Post_count;
  private $Post_status;
  private $Post_comment_id;
  private $Post_comment_author;
  private $Comment_content;
  private $Comment_date;
  private $Comment_status;
  private $Post_comment_Email;

public function getPost_comment_id()
{
    return $this->Post_comment_id;
}


public function setPost_comment_id($Post_comment_id)
{
    $this->Post_comment_id = $Post_comment_id;
}


public function getPost_comment_author()
{
    return $this->Post_comment_author;
}


public function setPost_comment_author($Post_comment_author)
{
    $this->Post_comment_author = $Post_comment_author;
}


public function getPost_comment_Email()
{
    return $this->Post_comment_Email;
}


public function setPost_comment_Email($Post_comment_Email)
{
    $this->Post_comment_Email = $Post_comment_Email;
}

public function getComment_content()
{
    return $this->Comment_content;
}


public function setComment_content($Comment_content)
{
    $this->Comment_content = $Comment_content;
}

public function getComment_date()
{
    return $this->Comment_date;
}


public function setComment_date($Comment_date)
{
    $this->Comment_date = $Comment_date;
}

public function getComment_status()
{
    return $this->Comment_status;
}


public function setComment_status($Comment_status)
{
    $this->Comment_status = $Comment_status;
}

	public function showPosts()
		{
			try
			{
                 $limit = 6;
                 $page = isset($_GET['page']) ? $_GET['page'] : 1;
                 $start = ($page - 1) * $limit;
              

                $result = $this->sentence("SET CHARACTER SET utf8");
                $result = $this->sentence("SELECT * FROM posts WHERE post_status = 'published' LIMIT $start, $limit");
                
                
			        	return $result;
			}
			catch(Exception $e)
			{
				echo $e;
			}
    }
    
    public function countPosts()
		{
			try
			{
           

        $result = $this->sentence("SELECT count(post_id) AS id from posts");
       
        return $result;
			}
			catch(Exception $e)
			{
				echo $e;
			}
    }
    
    public function showPostByCategory($post_category)
		{
			try
			{
           

        $result = $this->sentence("SELECT * from posts WHERE post_category_id =  $post_category");
       
        return $result;
			}
			catch(Exception $e)
			{
				echo $e;
			}
    }
    
    public function showPostById($the_post_id)
		{
			try
			{
           

        $result = $this->sentence("SELECT * from posts WHERE post_id = $the_post_id");
       
        return $result;
			}
			catch(Exception $e)
			{
				echo $e;
			}
    }
    
    public function addCommentPost()
    {
        try {
            $result = $this->sentence("SET CHARACTER SET utf8");
            $result = $this->sentence("INSERT INTO post_comments(comment_post_id, comment_author, comment_email,comment_content,comment_status,comment_date) 
                                     VALUES( 
                                          '$this->Post_comment_id',
                                          '$this->Post_comment_author',
                                          '$this->Post_comment_Email',
                                          '$this->Comment_content',
                                          'unaproved',
                                          now())");
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


    public function showComments($the_post_id)
		{
			try
			{
           

        $result = $this->sentence("SELECT * FROM post_comments WHERE comment_post_id = {$the_post_id} AND comment_status = 'approved' ORDER BY id DESC");
       
        return $result;
			}
			catch(Exception $e)
			{
				echo $e;
			}
    }

    
    public function showCategories()
		{
			try
			{
           

        $result = $this->sentence("SELECT * FROM categories");
       
        return $result;
			}
			catch(Exception $e)
			{
				echo $e;
			}
    }


        public function searchPost($search) {
            try {
        
                $result = $this->sentence("SELECT * FROM posts WHERE post_tags  LIKE  '%$search%' ");

                if ($result->rowCount() > 0){
                        // return "exito";
                      
                        return $result;
                } else {
                    return "fallo";
                }
        
        } catch(Exception $e){
                    echo $e;
                }
    }

}



?>