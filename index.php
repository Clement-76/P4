<?php 

session_start();

require_once "Autoloader.php";
use ClementPatigny\Autoloader;
Autoloader::register();

use ClementPatigny\Controller\PostsController;
use ClementPatigny\Controller\HomeController;
use ClementPatigny\Controller\UserController;

if (isset($_GET['action'])) {
    if ($_GET['action'] == "listPosts") {
        $controller = new PostsController();
        $controller->listPosts();
    } elseif ($_GET['action'] == "viewPost") {
        $controller = new PostsController();
        $controller->viewPost();
    } elseif ($_GET['action'] == "login") {
        $controller = new UserController();
        $controller->login();
    } elseif ($_GET['action'] == "logout") {
        $controller = new UserController();
        $controller->logout();
    } elseif ($_GET['action'] == "listPostsAdmin") {
        $controller = new PostsController();
        $controller->listPostsAdmin();
    }
} else {
    $controller = new HomeController();
    $controller->viewHome();
}
