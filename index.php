<?php 

require 'vendor/autoload.php';
$database = require 'core/bootstrap.php';
// function checkAge($value) 
// {

//   if($value >= 21) {
//     echo "Welcome";
//   } else {
//     echo "No welcome";
//   }


// }

// checkAge(13);



// $task = new Task('Go to the store');

// $task->complete();

// var_dump($task->isComplete()); 

// $tasks = [
//   new Task('Go to the store'),
//   new Task('Go to the bed'),
//   new Task('Go to the school')
// ];

// $tasks[0]->complete();






// $router = new Router;

// require 'routes.php';



// die(var_dump($app['config']));
// require $router->direct($uri);

$router =  Router::load('routes.php');
require $router->direct(Request::uri(),Request::method());

?>

