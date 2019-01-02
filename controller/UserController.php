<?php

namespace ClementPatigny\Controller;

use ClementPatigny\Model\UserManager;
use ClementPatigny\Controller\AppController;

class UserController extends AppController {

    /**
     * login the user
     */
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
        
        $this->render(['login'], compact('pageTitle', 'errors'));
    }

    /**
     * logout the user
     */
    public function logout() {
        $_SESSION = [];
        session_destroy();

        header('Location: index.php');
    }
}
