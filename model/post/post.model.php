<?php 
include_once('../config/connection.php');

Class Post extends Connection {
        private $Post_id;
        private $Post_category_id;
        private $Post_title;
        private $Post_user;
        private $Post_date;
        private $Post_image;
        private $Post_content;
        private $Post_tags;
        private $Post_status;
        private $Post_comment_id;
        private $Post_comment_author;
        private $Comment_content;
        private $Comment_date;
        private $Comment_status;
        private $Post_comment_Email;
      
        public function getPost_id()
        {
            return $this->Post_status;
        }


        public function setPost_id($Post_id)
        {
            $this->Post_id = $Post_id;
        }


        public function getPost_status()
        {
            return $this->Post_status;
        }


        public function setPost_status($Post_status)
        {
            $this->Post_status = $Post_status;
        }

        public function getPost_tags()
        {
            return $this->Post_tags;
        }


        public function setPost_tags($Post_tags)
        {
            $this->Post_tags = $Post_tags;
        }
        
        public function getPost_content()
        {
            return $this->Post_content;
        }


        public function setPost_content($Post_content)
        {
            $this->Post_content = $Post_content;
        }

        public function getPost_image()
        {
            return $this->Post_image;
        }


        public function setPost_image($Post_image)
        {
            $this->Post_image = $Post_image;
        }

        public function getPost_date()
        {
            return $this->Post_date;
        }


        public function setPost_date($Post_date)
        {
            $this->Post_date = $Post_date;
        }


        public function getPost_user()
        {
            return $this->Post_user;
        }


        public function setPost_user($Post_user)
        {
            $this->Post_user = $Post_user;
        }

        public function getPost_title()
        {
            return $this->Post_title;
        }


        public function setPost_title($Post_title)
        {
            $this->Post_title = $Post_title;
        }

        public function getPost_category_id()
        {
            return $this->Post_category_id;
        }


        public function setPost_category_id($Post_category_id)
        {
            $this->Post_category_id = $Post_category_id;
        }

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
                            return $result;
                        } else {
                            return "fallo";
                        }
                
                } catch(Exception $e){
                            echo $e;
                        }
            }


            public function listPosts()
            {
                try
                {
            

            $result = $this->sentence("SELECT * FROM posts");
        
            return $result;
                }
                catch(Exception $e)
                {
                    echo $e;
                }
        }



        public function listComments()
        {
            try
            {
        

        $result = $this->sentence("SELECT * FROM post_comments");

        return $result;
            }
            catch(Exception $e)
            {
                echo $e;
            }
        }
        public function listUsers()
        {
            try
            {
        

        $result = $this->sentence("SELECT * FROM users");

        return $result;
            }
            catch(Exception $e)
            {
                echo $e;
            }
        }
        public function listCategories()
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

            public function listPostsPublished()
            {
                    try
                    {
                

                $result = $this->sentence("SELECT COUNT(post_id) FROM posts  WHERE  post_status = 'published'");

                return $result;
                    }
                    catch(Exception $e)
                    {
                        echo $e;
                    }
            }

        public function listCommentUnaproved()
        {
            try
            {
        

        $result = $this->sentence("SELECT COUNT(id) FROM post_comments WHERE  comment_status = 'unapproved'");

        return $result;
            }
            catch(Exception $e)
            {
                echo $e;
            }
        }



        public function listUsersSubscriber()
        {
            try
            {
        

        $result = $this->sentence("SELECT  COUNT(id) FROM users WHERE  user_role = 'subscribers'");

        return $result;
            }
            catch(Exception $e)
            {
                echo $e;
            }
        }




        public function showAllPost()
        {
            try
            {
        

        $result = $this->sentence("SELECT * FROM posts P
                                   INNER JOIN categories C ON P.post_category_id = C.category_id
                                   INNER JOIN users U ON P.post_user = U.id
        ");

        return $result;
            }
            catch(Exception $e)
            {
                echo $e;
            }
        }



        public function showCategoriesByPostId($post_category_id)
        {
            try
            {
        

        $result = $this->sentence("SELECT * FROM categories WHERE category_id =  $post_category_id");

        return $result;
            }
            catch(Exception $e)
            {
                echo $e;
            }
        }
        public function showCommentByPostId($post_id)
        {
            try
            {
        

        $result = $this->sentence("SELECT count(PC.id) AS total FROM post_comments PC WHERE PC.comment_post_id = $post_id");

        return $result;
            }
            catch(Exception $e)
            {
                echo $e;
            }
        }



        public function createPost()
        {
            try {
                $result = $this->sentence("SET CHARACTER SET utf8");
                $result = $this->sentence("INSERT INTO posts(post_category_id, 
                                                            post_title, 
                                                            post_user, 
                                                            post_date, 
                                                            post_image, 
                                                            post_content, 
                                                            post_tags, 
                                                            post_status) 
                                        VALUES( 
                                            '$this->Post_category_id',
                                            '$this->Post_title',
                                            '$this->Post_user',
                                            now(),
                                            '$this->Post_image',
                                            '$this->Post_content',
                                            '$this->Post_tags',
                                            '$this->Post_status'
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

        public function updatePost()
        {
            try {
                $result = $this->sentence("SET CHARACTER SET utf8");
                $result = $this->sentence("UPDATE posts SET 
                post_category_id =  '$this->Post_category_id',
                post_title =  '$this->Post_title',
                post_user =   '$this->Post_user',
                post_date =   now(),
                post_content =  '$this->Post_content',
                post_tags  =  '$this->Post_tags',
                post_image  =  '$this->Post_image',
                post_status  =  '$this->Post_status'
                
                WHERE post_id = '$this->Post_id'");
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
        public function deletePost()
        {
            try {
                $result = $this->sentence("SET CHARACTER SET utf8");
                $result = $this->sentence("DELETE FROM posts WHERE post_id = $this->Post_id");
                
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
