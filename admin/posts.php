<?php include "includes/header.php" ?>
          <?php               
                       if(isset($_GET['source'])) {
                         $source = $_GET['source'];
                       } else {
                         $source = " ";
                       }
                       switch($source) {
                         case 'add_post';
                         include "includes/add_posts.php";
                          break;
                          case 'edit_post';
                          include "includes/edit_posts.php";
                          break;
                          case '200';
                           echo "NICE 200";
                          break;
                          default:
                          include "includes/view_all_post.php";
                        break;
                       }
            ?>  
  <?php include "includes/footer.php" ?>