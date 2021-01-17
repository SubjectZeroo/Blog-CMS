<?php

$post = App::get('database')->getPostUpdate($_GET['p_id']);
$categories = App::get('database')->selectAll('categories');




require 'views/admin-blog/edit_post.php';


