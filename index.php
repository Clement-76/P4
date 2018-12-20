<?php 

require_once "Autoloader.php";
use ClementPatigny\Autoloader;
Autoloader::register();

session_start();

$namespace = 'ClementPatigny\Controller\\';

if (isset($_GET['action']) && !empty($_GET['action'])) {
    $action = $_GET['action'];
    
    if (in_array($action, ['listPosts', 'listPostsAdmin', 'viewPost', 'addPost', 'editPost'])) {
        $controller = $namespace . 'PostsController';
    } elseif (in_array($action, ['login', 'logout'])) {
        $controller = $namespace . 'UserController';
    } else {
        header("HTTP/1.0 404 Not Found");
        exit;
    }
} else {
    $action = 'viewHome';
    $controller = $namespace . 'defaultController';
}

$controller = new $controller();
$controller->$action();



