<?php

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/note', 'notes/show.php');
$router->get('/notes/create', 'notes/create.php');

$router->get('/notes/edit','notes/edit.php');
$router->patch('/notes/update','notes/update.php');

$router->post('/notes', 'notes/store.php');

$router->delete('/notes', 'notes/destroy.php');


$router->get('/register', 'registeration/create.php')->only('guest');
$router->post('/register', 'registeration/store.php');

$router->get('/login', 'session/create.php');
$router->post('/login', 'session/store.php');
$router->delete('/logout', 'session/destroy.php');