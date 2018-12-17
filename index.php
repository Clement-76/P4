<?php 

session_start();

require_once "Autoloader.php";
use ClementPatigny\Autoloader;
Autoloader::register();

$namespace = 'ClementPatigny\Controller\\';

if (isset($_GET['action']) && !empty($_GET['action'])) {
    $action = $_GET['action'];
    
    if (in_array($action, ['listPosts', 'listPostsAdmin', 'viewPost'])) {
        $controller = $namespace . 'PostsController';
    } elseif (in_array($action, ['login', 'logout'])) {
        $controller = $namespace . 'UserController';
    } else {
        header("HTTP/1.0 404 Not Found");
        exit;
    }
} else {
    $action = 'viewHome';
    $controller = $namespace . 'HomeController';
}

$controller = new $controller();
$controller->$action();



