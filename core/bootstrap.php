<?php


App::bind('config', require 'config.php');

// $config = App::get('config');

// die(var_dump(App::get('config')));

App::bind('database' , new QueryBuilder(

  Connection::make(App::get('config')['database'])
));



// $app = [];


// $app['config'] = require 'config.php';


// $app['database'] = new QueryBuilder(
//   Connection::make($app['config']['database'])
// );



// require 'core/Router.php';
// require 'core/Request.php';
// require 'core/db/Connection.php';
// require 'core/db/QueryBuilder.php';
// $pdo = Connection::make($config['database']);
// $query = new QueryBuilder($pdo);

