<table class="table-bordered table table-hover">
                          <thead>
                            <tr>
                              <th>Id</th>
                              <th>Username</th>
                              <th>Firts Name</th>
                              <th>Last Name</th>
                              <th>Email</th>
                              <th>Role</th>
                              <th>Date</th>   
                            </tr>
                          </thead>                     
                          <tbody>
                            <?php 
                                $query = "SELECT * FROM users";
                                $select_users = mysqli_query($connection, $query);                       
                                while($row = mysqli_fetch_assoc($select_users)) {
                                  $user_id = $row['id'];
                                  $username = $row['username'];
                                  $user_password = $row['user_password'];
                                  $user_firtsname = $row['user_firtsname'];
                                  $user_lastname = $row['user_lastname'];
                                  $user_email = $row['user_email'];
                                  $user_image = $row['user_image'];
                                  $user_role = $row['user_role'];
                                  // $user_date = $row['user_date'];
                                 
                            
                                    echo "<tr>";
                                    echo "<td> $user_id </td> ";
                                    echo "<td>  $username </td> ";
                                    echo "<td> $user_firtsname</td> ";

                                // $query = "SELECT * FROM categories WHERE category_id =  {$post_category_id}";
                                //     $select_categories_id = mysqli_query($connection, $query);
                      
                                //       while($row = mysqli_fetch_assoc( $select_categories_id)) {
                                //              $cat_id = $row['category_id'];
                                //               $cat_title = $row['category_title'];
                                         

                                //     echo "<td>{$cat_title}</td> ";
                                //   }


                                echo "<td> $user_lastname </td> ";
                                echo "<td> $user_email </td> ";
                                echo "<td> $user_role </td> ";
      
                              

            // $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
            // $select_post_id_query = mysqli_query($connection, $query);
            // while($row = mysqli_fetch_assoc($select_post_id_query)){
            //   $post_id = $row['post_id'];
            //   $post_title = $row['post_title'];

            //   echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
            // }

        

                                   


                                    echo "<td><a href='users.php?change_to_admin=$user_id'>ADMIN</a></td> ";
                                    
                                    echo "<td><a href='users.php?change_to_subscriber=$user_id'>Subscriber</a></td> ";

                                    echo "<td><a href='users.php?delete=$user_id'> Delete</a></td> ";

                                    echo "<td><a href='users.php?source=edit_user&edit_user=$user_id'> Edit</a></td> ";

                                    echo "</tr>";
                                }
                                ?>
                          </tbody> 
                       </table>                     


                       <?php 



                  if(isset($_GET['change_to_admin'])) {
                    $the_user_id = $_GET['change_to_admin'];
                  $query = "UPDATE users SET user_role = 'admin' WHERE id =  $the_user_id";
                  $change_user_query = mysqli_query($connection, $query);
                  header("Location: users.php");
                  }   



                    if(isset($_GET['change_to_subscriber'])) {
                      $the_user_id = $_GET['change_to_subscriber'];
                    $query = "UPDATE users SET user_role = 'subscriber' WHERE id = $the_user_id";
                    $change_user_query = mysqli_query($connection, $query);
                    header("Location: users.php");
                    }   




                        if(isset($_GET['delete'])) {
                          $the_user_id = $_GET['delete'];
                        $query = "DELETE FROM users WHERE id = {$the_user_id}";
                        $delete_user_query = mysqli_query($connection, $query);
                        header("Location: users.php");
                        }                       
                       ?>