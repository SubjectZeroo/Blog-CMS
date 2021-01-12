<?php
$PostsCategories = App::get('database')->getPostByCategory($_GET['category']);
$categories = App::get('database')->selectAll('categories');
$postsRelevants = App::get('database')->getPostsRelevants();
require 'views/category.view.php';