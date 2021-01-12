<?php 
// $posts = App::get('database')->selectAll('posts');
$posts = App::get('database')->showPost('posts');
$countPosts = App::get('database')->countPosts();
$categories = App::get('database')->selectAll('categories');
$postsRelevants = App::get('database')->getPostsRelevants();

$limit = 6;
$count =$countPosts;
$total = $count[0]['id'];
$pages = ceil($total / $limit);

require 'views/index.view.php';