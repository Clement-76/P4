<?php 

require_once "Autoloader.php";
use ClementPatigny\Autoloader;
Autoloader::register();

session_start();

$namespace = 'ClementPatigny\Controller\\';


if (isset($_GET['action']) && !empty($_GET['action'])) {
    $action = $_GET['action'];
    
    if (in_array($action, ['listPostsAdmin', 'viewPost', 'addPost', 'editPost', 'deletePost'])) {
        $controller = $namespace . 'PostsController';
    } elseif (in_array($action, ['login', 'logout'])) {
        $controller = $namespace . 'UserController';
    } elseif (in_array($action, ['addComment'])) {
        $controller = $namespace . 'CommentsController';
    } else {
        header("HTTP/1.0 404 Not Found");
        exit;
    }
} else {
    $action = 'listPosts';
    $controller = $namespace . 'PostsController';
}

$controller = new $controller();
$controller->$action();
