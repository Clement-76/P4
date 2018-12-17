<?php

namespace ClementPatigny\Controller;

use ClementPatigny\Model\PostsManager;

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
            header('HTTP/1.0 403 Forbidden');
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
}
