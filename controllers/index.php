<?php 

$posts = App::get('database')->showPost('posts');
$countPosts = App::get('database')->countPosts();
$categories = App::get('database')->countCategories();
$postsRelevants = App::get('database')->getPostsRelevants();

$limit = 6;
$count =$countPosts;
$total = $count[0]['id'];
$pages = ceil($total / $limit);

require 'views/blog-public/index.view.php';