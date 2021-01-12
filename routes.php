<?php

// $router->define([

//   '' => 'controllers/index.php',
//   'about' => 'controllers/about.php',
//   'about/culture' => 'controllers/about-culture.php',
//   'contact' => 'controllers/contact.php',
//   'names' => 'controllers/add-name.php',
// ]);


$router->get('', 'controllers/index.php');
$router->get('sign', 'controllers/sign.php');
$router->get('post', 'controllers/post.php');
$router->get('category', 'controllers/category.php');
$router->get('search', 'controllers/search.php');
// $router->get('about/culture', 'controllers/about.php');
// $router->post('names', 'controllers/add-name.php');


// var_dump($router->routes);