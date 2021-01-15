<?php
$posts = App::get('database')->getPosts();
require 'views/admin-blog/table_post.view.php';