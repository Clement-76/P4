<?php

use ClementPatigny\Model\UserManager;

function login() {
    $errors = false;
    
    if (isset($_POST['user_login']) && isset($_POST['user_password'])) {
        $userManager = new UserManager();
        $user = $userManager->getUser($_POST['user_login']);
        
        if (password_verify($_POST['user_password'], $user->getPassword())) {
            session_start();
            $_SESSION['user'] = $user;
            header('Location: index.php');
        } else {
            $errors = true;
        }
    }
    
    $pageTitle = "Connexion";

    require_once "view/menu.php";
    require_once "view/login.php";
    require_once "view/script.html";
}

function logout() {
    session_start();
    $_SESSION = [];
    session_destroy();
    
    header('Location: index.php');
}