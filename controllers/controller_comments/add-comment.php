<?php

if(isset($_POST['create_comment'])) {

$postId =  $_GET['p_id'];

    App::get('database')->insert('post_comments',[ 
        'comment_post_id' => $postId,
        'comment_author'  => $_POST['comment_author'],
        'comment_email'   => $_POST['comment_email'],
        'comment_content' => $_POST['comment_content'],
        'comment_status'  => 'approved',
        'comment_date'    => date('d-m-y')
        ]);  

    header("Location: /post?p_id={$postId}"); 
} 
