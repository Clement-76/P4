<?php 

require_once "Autoloader.php";
use ClementPatigny\Autoloader;
Autoloader::register();

require_once "controller/controller.php";

if (isset($_GET['action'])) {
    if ($_GET['action'] == "viewArticle") {
        if (isset($_GET['id'])) {
            viewArticle($_GET['id']);
        }
    }
} else {
    listArticles();
}
