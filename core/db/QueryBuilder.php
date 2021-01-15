<?php
  class QueryBuilder
  {
    protected $pdo;

    public function __construct($pdo)
    {
      $this->pdo = $pdo;
    }
  
    public function selectAll($table)
    {

      $statement = $this->pdo->prepare("SELECT * FROM {$table}");

      $statement->execute();

      return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function insert($table, $parameters)
    {

    //  die(var_dump(array_keys($parameters))); 

        
     $sql = sprintf(
        'INSERT INTO %s (%s) VALUES (%s)',

        $table,
        implode(', ', array_keys($parameters)),
        ':' . implode(', :', array_keys($parameters))
      );

      try {    
      $statement = $this->pdo->prepare($sql);




      $statement->execute($parameters);

      }catch(PDOException $e) {
        die('whoops, something went wrong');

      } 
      // die(var_dump($sql));
    }


    public function showPost($table)
    {
      try
      {
          $limit = 6;
          $page = isset($_GET['page']) ? $_GET['page'] : 1;
          $start = ($page - 1) * $limit;       
          $statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE post_status = 'published' LIMIT $start, $limit");
          $statement->execute();
          return $statement->fetchAll(PDO::FETCH_CLASS);
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
                $statement = $this->pdo->prepare("SELECT count(post_id) AS id from posts");
                $statement->execute();
                return $statement->fetchAll(PDO::FETCH_ASSOC);
            }catch(Exception $e)
              {
                echo $e;
      }
    }

    public function getPostsRelevants()
    {
        try
            {
                $statement = $this->pdo->prepare("SELECT P.post_id, P.post_title , P.post_date,COUNT(PC.comment_post_id) FROM posts P INNER JOIN post_comments PC ON P.post_id = PC.comment_post_id  GROUP BY P.post_id HAVING COUNT(*) >= 1 LIMIT 5");
                $statement->execute();
                return $statement->fetchAll(PDO::FETCH_CLASS);
            }catch(Exception $e)
              {
                echo $e;
      }
    }

    public function getPostById($the_post_id)
    {
        try
            {
                $statement = $this->pdo->prepare("SELECT * from posts WHERE post_id = $the_post_id");
                $statement->execute();
                return $statement->fetchAll(PDO::FETCH_CLASS);
            }catch(Exception $e)
              {
                echo $e;
      }
    }

    public function getCommentById($the_post_id)
    {
        try
            {
                $statement = $this->pdo->prepare("SELECT * FROM post_comments WHERE comment_post_id = {$the_post_id} AND comment_status = 'approved' ORDER BY id DESC");
                $statement->execute();
                return $statement->fetchAll(PDO::FETCH_CLASS);
            }catch(Exception $e)
              {
                echo $e;
      }
    }


    public function getPostByCategory($post_category)
    {
        try
            {
                $statement = $this->pdo->prepare("SELECT * from posts WHERE post_category_id =  $post_category");
                $statement->execute();
                return $statement->fetchAll(PDO::FETCH_CLASS);
            }catch(Exception $e)
              {
                echo $e;
      }
    }

    
    public function searchPost($search)
    {
        try
            {
                $statement = $this->pdo->prepare("SELECT * FROM posts WHERE post_tags   LIKE '%$search%'  OR  post_title LIKE '%$search%'");
                $statement->execute();
                return $statement->fetchAll(PDO::FETCH_CLASS);
            }catch(Exception $e)
              {
                echo $e;
      }
    }

    public function getUserByUsername($username)
    {
        try
            {
                $statement = $this->pdo->prepare("SELECT * FROM users WHERE username = '$username'");
                $statement->execute();
                return $statement->fetchAll(PDO::FETCH_CLASS);
            }catch(Exception $e)
              {
                echo $e;
      }
    } 
        
    public function count($row,$table)
    {
        try
            {
                $statement = $this->pdo->prepare("SELECT COUNT({$row}) FROM {$table}");
                $statement->execute();
                return $statement->fetchColumn();
            }catch(Exception $e)
              {
                echo $e;
      }
    }      
    

    public function getPosts()
    {
        try
            {
                $statement = $this->pdo->prepare("SELECT * FROM posts P
                INNER JOIN categories C ON P.post_category_id = C.category_id
                INNER JOIN users U ON P.post_user = U.id");
                $statement->execute();
                return $statement->fetchAll(PDO::FETCH_CLASS);
            }catch(Exception $e)
              {
                echo $e;
      }
    } 

    public function getComments()
    {
        try
            {
                $statement = $this->pdo->prepare("SELECT * FROM post_comments PC INNER JOIN posts P ON P.post_id = PC.comment_post_id");
                $statement->execute();
                return $statement->fetchAll(PDO::FETCH_CLASS);
            }catch(Exception $e)
              {
                echo $e;
      }
    } 

  }