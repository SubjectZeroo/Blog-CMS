<?php

$router->get('', 'controllers/index.php');
$router->get('sign', 'controllers/sign.php');
$router->get('post', 'controllers/post.php');
$router->get('category', 'controllers/category.php');
$router->get('search', 'controllers/search.php');
$router->get('admin', 'controllers/admin.php');
$router->get('panel', 'controllers/panel.php');
$router->get('table-posts', 'controllers/table_posts.php');
$router->get('table-comments', 'controllers/table_comments.php');
$router->get('table-categories', 'controllers/table_categories.php');