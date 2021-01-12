<?php
$searchPosts = App::get('database')->searchPost($_GET['search']);

require 'views/search.view.php';