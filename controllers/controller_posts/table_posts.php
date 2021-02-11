<?php
$posts = App::get('database')->getPosts();
$categories = App::get('database')->selectAll('categories');
require 'views/admin-blog/table_post.view.php';
