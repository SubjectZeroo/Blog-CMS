<?php

if(isset($_POST['create_post'])){



    $targetDir = "images";
    App::get('database')->insert('posts',[
    
        'post_title' => $_POST['post_title'],
        'post_tags' =>  $_POST['post_tags'],
        'post_date' =>  date('d-m-y'),
        'post_content' => $_POST['post_content'],
        'post_image' => $_FILES['image']['name'],
        'post_status' => $_POST['post_status'],
        'post_category_id' => $_POST['post_category']


        ]);

       $post_image_tmp = $_FILES['image']['tmp_name'];
       $post_image = $_FILES['image']['name'];
    //    move_uploaded_file($post_image_temp, "../../images/$post_image");
       move_uploaded_file($post_image_tmp, $targetDir.'/'.$post_image);
    header("Location: /table-posts"); 

    }