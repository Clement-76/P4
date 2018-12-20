<?php

namespace ClementPatigny\Controller;

class defaultController {
    
    public function viewHome() {
        $pageTitle = "Accueil - Jean Forteroche";

        require_once "view/menu.php";
        require_once "view/home.html";
        require_once "view/script.html";
    }
}
