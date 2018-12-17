<?php

namespace ClementPatigny\Controller;

use ClementPatigny\Model\UserManager;

class UserController {
    
    private $_postsController;
    
    public function __construct(PostsController $postsController) {
        $this->setPostsController($postsController);
    }
    
    public function setPostsController($postsController) {
        $this->_postsController = $postsController;
    }
    
    public function login() {
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

    public function logout() {
        $_SESSION = [];
        session_destroy();

        header('Location: index.php');
    }

    public function viewAdminPanel() {
        if (isset($_SESSION['user'])) {
            $pageTitle = "Administration";

            require_once "view/menu.php";
            require_once "view/admin.php";
            $this->_postsController->listPosts();
        } else {
            header('HTTP/1.0 403 Forbidden');
        }
    }
}
