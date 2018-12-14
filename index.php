<?php 

require_once "Autoloader.php";
use ClementPatigny\Autoloader;
Autoloader::register();

require_once "controller/ArticleController.php";
require_once "controller/UserController.php";

if (isset($_GET['action'])) {
    if ($_GET['action'] == "viewArticle") {
        if (isset($_GET['id'])) {
            viewArticle($_GET['id']);
        }
    } elseif ($_GET['action'] == "login") {
        login();
    } elseif ($_GET['action'] == "logout") {
        logout();
    }
} else {
    listArticles();
}
