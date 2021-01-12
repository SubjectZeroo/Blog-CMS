<?php 
$posts = App::get('database')->getPostById($_GET['p_id']);
$comments = App::get('database')->getCommentById($_GET['p_id']);
require 'views/post.view.php';