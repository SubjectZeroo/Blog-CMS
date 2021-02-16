<?php
$PostsCategories = App::get('database')->getPostByCategory($_GET['category']);
$categories = App::get('database')->countCategories();
$postsRelevants = App::get('database')->getPostsRelevants();
require 'views/blog-public/category.view.php';