<?php
$posts = App::get('database')->count('post_id','posts');
$users = App::get('database')->count('id','users');
$comments = App::get('database')->count('id','post_comments');
$categories = App::get('database')->count('category_id','categories');

// $countPost = $posts->rowCount();
require 'views/admin-blog/index.view.php';