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

    public function viewPost($idPost) {
        $postsManager = new PostsManager();
        $post = $postsManager->getPost($idPost);
        $pageTitle = $post->getTitle();

        require_once "view/menu.php";
        require_once "view/post.php";
        require_once "view/script.html";
    }
}
