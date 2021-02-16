<?php

$router->get('', 'controllers/index.php');
$router->get('post', 'controllers/post.php');
$router->get('category', 'controllers/category.php');
$router->get('search', 'controllers/search.php');
$router->get('admin', 'controllers/admin.php');
$router->post('login', 'controllers/login.php');
$router->get('logout', 'controllers/logout.php');
$router->get('panel', 'controllers/panel.php');



$router->get('table-posts', 'controllers/controller_posts/table_posts.php');
$router->post('add-post', 'controllers/controller_posts/add_post.php');
$router->get('form-edit-post', 'controllers/controller_posts/form_edit_post.php');
$router->post('edit-post', 'controllers/controller_posts/edit_post.php');
$router->get('delete-post', 'controllers/controller_posts/delete_post.php');


$router->get('table-comments', 'controllers/table_comments.php');
$router->post('add-comment', 'controllers/controller_comments/add-comment.php');
$router->get('update-comment', 'controllers/update_comments.php');
$router->get('delete-comment', 'controllers/delete-comment.php');


$router->get('table-categories', 'controllers/table_categories.php');
$router->post('add-category', 'controllers/add-category.php');
$router->get('delete-category', 'controllers/delete_category.php');
