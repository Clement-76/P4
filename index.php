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
        if (isset($_GET['id'])) {
            $controller = new PostsController();
            $controller->viewPost($_GET['id']);
        }
    } elseif ($_GET['action'] == "login") {
        $controller = new UserController(new PostsController);
        $controller->login();
    } elseif ($_GET['action'] == "logout") {
        $controller = new UserController(new PostsController);
        $controller->logout();
    } elseif ($_GET['action'] == "viewAdminPanel") {
        $controller = new UserController(new PostsController);
        $controller->viewAdminPanel();
    }
} else {
    $controller = new HomeController();
    $controller->viewHome();
}
