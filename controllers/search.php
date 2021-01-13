<?php
$searchPosts = App::get('database')->searchPost($_GET['search']);

require 'views/blog-public/search.view.php';