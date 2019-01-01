<?php

namespace ClementPatigny\Controller;

use ClementPatigny\Model\UserManager;

class UserController {

    public function login() {
        $errors = false;

        if (isset($_POST['user_login']) && isset($_POST['user_password'])) {
            $userManager = new UserManager();
            $user = $userManager->getUser($_POST['user_login']);

            if (password_verify($_POST['user_password'], $user->getPassword())) {
                $_SESSION['user'] = $user;
                header('Location: index.php?action=listPostsAdmin');
            } else {
                $errors = true;
            }
        }

        $pageTitle = "Connexion";

        require_once "view/menu.php";
        require_once "view/login.php";
        require_once "view/script.php";
    }

    public function logout() {
        $_SESSION = [];
        session_destroy();

        header('Location: index.php');
    }
}
