<?php include "includes/header.php" ?> 

<table class="table">
  <thead>
    <tr>
      <th>Id</th>
      <th>Author</th>
      <th>Comment</th>
      <th>Email</th>
      <th>Status</th>
      <th>In Response to</th>
      <th>Date</th>
      <th>Aprove</th>
      <th>Unaprove</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php 
                                $query = "SELECT * FROM post_comments WHERE comment_post_id  =" . mysqli_real_escape_string($connection,$_GET['id']);
                                $select_comments = mysqli_query($connection, $query);                       
                                while($row = mysqli_fetch_assoc($select_comments)) {
                                  $comment_id = $row['id'];
                                  $comment_post_id = $row['comment_post_id'];
                                  $comment_author = $row['comment_author'];
                                  $comment_email = $row['comment_email'];
                                  $comment_content = $row['comment_content'];
                                  $comment_status = $row['comment_status'];
                                  $comment_date = $row['comment_date'];
                                 
                            
                                    echo "<tr>";
                                    echo "<td> $comment_id </td> ";
                                    echo "<td> $comment_author </td> ";
                                    echo "<td> $comment_content</td> ";

                                // $query = "SELECT * FROM categories WHERE category_id =  {$post_category_id}";
                                //     $select_categories_id = mysqli_query($connection, $query);
                      
                                //       while($row = mysqli_fetch_assoc( $select_categories_id)) {
                                //              $cat_id = $row['category_id'];
                                //               $cat_title = $row['category_title'];
                                         

                                //     echo "<td>{$cat_title}</td> ";
                                //   }


                                echo "<td>$comment_email </td> ";
                                echo "<td>$comment_status </td> ";
                               
      
                              

            $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
            $select_post_id_query = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($select_post_id_query)){
              $post_id = $row['post_id'];
              $post_title = $row['post_title'];

              echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
            }

            echo "<td>$comment_date </td> ";

                                   


                                    echo "<td><a href='comments.php?approved=$comment_id'>Approve</a></td> ";
                                    
                                    echo "<td><a href='comments.php?unapproved=$comment_id'>Unaprove</a></td> ";

                                    echo "<td><a href='post_comments.php?delete=$comment_id&id=". $_GET['id'] ."'> Delete</a></td> ";


                                    echo "</tr>";
                                }
                                ?>
  </tbody>
</table>


<?php 
                  if(isset($_GET['approved'])) {
                    $the_comment_id = $_GET['approved'];
                  $query = "UPDATE post_comments SET comment_status = 'approved' WHERE id =  $the_comment_id";
                  $unaprove_comment_query = mysqli_query($connection, $query);
                  header("Location:  post_comments.php");
                  }   



                    if(isset($_GET['unapproved'])) {
                      $the_comment_id = $_GET['unapproved'];
                    $query = "UPDATE post_comments SET comment_status = 'unapproved' WHERE id =  $the_comment_id";
                    $unaprove_comment_query = mysqli_query($connection, $query);
                    header("Location:  post_comments.php");
                    }   




                        if(isset($_GET['delete'])) {
                          $the_comment_id = $_GET['delete'];
                        $query = "DELETE FROM post_comments WHERE id = {$the_comment_id}";
                        $delete_query = mysqli_query($connection, $query);
                        header("Location: post_comments.php?id=". $_GET['id'] ."");
                        }                       
                       ?>
<?php include "includes/footer.php" ?>