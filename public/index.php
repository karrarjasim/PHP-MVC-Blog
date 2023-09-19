<?php

use Core\ValidationException;
use Core\Database;
use Core\Session;

const BASE_PATH = __DIR__.'/../';

require BASE_PATH.'/vendor/autoload.php';

require BASE_PATH.'Core/functions.php';
require base_path('bootstrap.php');



session_start();

$router = new Core\Router();
$routes = require base_path("routes.php");

$uri = $uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try{
    
    $router->route($uri, $method);

}catch (ValidationException $e) {
    
    Session::flash('errors', $e->errors);

    Session::flash('old', [
        'email' => $e->old['email']
    ]);
    
    return redirect($router->previousUrl());
}


Session::unflash();
