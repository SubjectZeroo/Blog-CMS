<?php
$PostsCategories = App::get('database')->getPostByCategory($_GET['category']);
$categories = App::get('database')->selectAll('categories');
$postsRelevants = App::get('database')->getPostsRelevants();
require 'views/blog-public/category.view.php';