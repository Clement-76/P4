<?php

namespace ClementPatigny\Controller;

use ClementPatigny\Model\PostsManager;
use ClementPatigny\Model\Post;

class PostsController {
    
    public function listPosts() {
        $postsManager = new PostsManager();
        $posts = $postsManager->getPosts();
        $pageTitle = "Blog - Jean Forteroche";

        require_once "view/menu.php";
        require_once "view/postSummary.php";
        require_once "view/script.html";
    }
    
    public function listPostsAdmin() {
        if (isset($_SESSION['user'])) {
            $postsManager = new PostsManager();
            $posts = $postsManager->getPosts();
            $pageTitle = "Administration";

            require_once "view/menu.php";
            require_once "view/postsAdmin.php";
            require_once "view/script.html";
        } else {
            header('Location: index.php?action=login');
        }
    }

    public function getSummary($content) {
        $words = explode(" ", $content);
        $summary = "";

        if (count($words) < 25) {
            $summary = $content;
        } else {
            for ($i = 0; $i < 25; $i++) {
                if ($i == 24) {
                    $summary .= $words[$i] . '...';
                } else {
                    $summary .= $words[$i] . ' ';
                }
            }
        }

        return $summary;
    }

    public function viewPost() {
        if (isset($_GET['id'])) {
            $postsManager = new PostsManager();
            $post = $postsManager->getPost($_GET['id']);
            $pageTitle = $post->getTitle();

            require_once "view/menu.php";
            require_once "view/post.php";
            require_once "view/script.html";
        }
    }
    
    public function addPost() {
        if (isset($_SESSION['user'])) {
            $errors['errors'] = false;
    
            if (isset($_POST['post_title']) && isset($_POST['post_content'])) {
                if (empty($_POST['post_title'])) {
                    $errors['errors'] = true;
                    $errors['post_title'] = true;
                }
                
                if (empty($_POST['post_content'])) {
                    $errors['errors'] = true;
                    $errors['post_content'] = true;
                }
                
                if (!$errors['errors']) {
                    $postFeatures = [
                        'content' => $_POST['post_content'],
                        'title' => $_POST['post_title'],
                        'author' => $_SESSION['user']->getLogin()
                    ];
                    
                    $post = new Post($postFeatures);
                    
                    $postManager = new PostsManager();
                    $postManager->addPost($post);
                    
                    header('Location: index.php?action=listPostsAdmin');
                    exit;
                }
            } else {
                $errors['errors'] = true;
            }

            $pageTitle = "Ajouter un nouvel article";

            require_once "view/menu.php";
            require_once "view/formPost.php";
            require_once "view/script.html";
        } else {
            header('Location: index.php?action=login');
            exit;
        }
    }
    
    public function editPost() {
        if (isset($_SESSION['user']) && isset($_GET['id'])) {
            $errors['errors'] = false;
            
            $postsManager = new PostsManager();
            $post = $postsManager->getPost($_GET['id']);
    
            if (isset($_POST['post_title']) && isset($_POST['post_content'])) {
                if (empty($_POST['post_title'])) {
                    $errors['errors'] = true;
                    $errors['post_title'] = true;
                }
                
                if (empty($_POST['post_content'])) {
                    $errors['errors'] = true;
                    $errors['post_content'] = true;
                }
                
                if (!$errors['errors']) {
                    $postsManager->editPost($_POST['post_title'], $_POST['post_content'], $_GET['id']);
                    
                    header('Location: index.php?action=listPostsAdmin');
                    exit;
                }
            } else {
                $errors['errors'] = true;
            }
            
            
            $pageTitle = "Modifier l'article";

            require_once "view/menu.php";
            require_once "view/formPost.php";
            require_once "view/script.html";
        } else {
            header('Location: index.php?action=login');
            exit;
        }
    }
}
