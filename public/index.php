<?php

use Router\Router;

require '../vendor/autoload.php';

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);
define('DB_NAME', 'serve');
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PWD', '');

$router = new Router($_SERVER['REQUEST_URI']);

$router->get('/', 'App\Controllers\BlogController@welcome');
$router->get('/lists', 'App\Controllers\BlogController@index');
$router->get('/post/:id', 'App\Controllers\BlogController@show');

$router->get('/admin/posts', 'App\Controllers\Admin\PostController@index');
$router->post('/admin/posts/delete/:id', 'App\Controllers\Admin\PostController@destroy');
$router->get('/admin/posts/edit/:id', 'App\Controllers\Admin\PostController@edit');
$router->post('/admin/posts/edit/:id', 'App\Controllers\Admin\PostController@update');

$router->run();
?> 