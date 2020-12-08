<?php 
include_once('model/connection.php');

Class Post extends Connection {
  private $postid;
  private $post_category_id;
  private $post_title;
  private $post_author;
  private $post_user;
  private $post_date;
  private $post_image;
  private $post_content;
  private $post_tags;
  private $post_count;
  private $post_status;

	public function showPosts()
		{
			try
			{
                 $per_page = 6;
                if(isset($_GET['page'])) {   
                    $page = $_GET['page'];
                } else {
                    $page = "";
                }

                if($page == "" || $page == 1){
                    $page_1 = 0;
                } else {
                    $page_1 = ($page *  $per_page) - $per_page;
                }

                $res = $this->sentence("SET CHARACTER SET utf8");
                $res = $this->sentence("SELECT * FROM posts");
                $count = $res->fetchColumn();
                $count = ceil($count /  $per_page);
				$res = $this->sentence("SELECT * from posts WHERE post_status = 'published' LIMIT $page_1 ,  $per_page");
				return $res;
			}
			catch(Exception $e)
			{
				echo $e;
			}
		}

}



?>