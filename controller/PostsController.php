<?php

namespace ClementPatigny\Controller;

use ClementPatigny\Model\PostsManager;
use ClementPatigny\Model\CommentsManager;
use ClementPatigny\Model\Post;
use ClementPatigny\Controller\AppController;

class PostsController extends AppController {
    
    /**
     * list all posts in the home page
     */
    public function listPosts() {
        $postsManager = new PostsManager();
        $posts = $postsManager->getPosts();
        $pageTitle = "Blog - Jean Forteroche";
        $description = "Venez découvrir le nouveau roman de Jean Forteroche : Billet simple pour l'Alaska.";
        
        $this->render(['home', 'postSummary', 'footer'], compact('posts', 'pageTitle', 'description'));
    }
    
    /**
     * list all posts in the admin panel in a html table
     */
    public function listPostsAdmin() {
        if (isset($_SESSION['user'])) {
            $postsManager = new PostsManager();
            $posts = $postsManager->getPosts();
            $pageTitle = "Administration";
            
            $this->render(['postsAdmin'], compact('posts', 'pageTitle'));
        } else {
            header('Location: index.php?action=login');
        }
    }

    /**
     * return a summary of a text
     * @param  string $content the text 
     * @return string the summary
     */
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

    /**
     * display a post and his comments
     */
    public function viewPost() {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $postsManager = new PostsManager();
            $nbLines = $postsManager->getNbPostLines($_GET['id']);
            
            if ($nbLines == 1) {
                $post = $postsManager->getPost($_GET['id']);
                
                $commentsManager = new CommentsManager();
                $comments = $commentsManager->getPostComments($_GET['id'], 'date');
                $pageTitle = $post->getTitle();
                $description = $this->getSummary(strip_tags($post->getContent()));
                
                $this->render(['post', 'comments', 'footer'], compact('post', 'comments', 'pageTitle', 'description'));
            } else {
                header('HTTP/1.0 404 Not Found');
            }
        } else {
            header('Location: index.php#blog');
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
                        'authorId' => $_SESSION['user']->getId()
                    ];
                    
                    $postManager = new PostsManager();
                    $postManager->addPost($postFeatures);
                    
                    header('Location: index.php?action=listPostsAdmin');
                    exit;
                }
            } else {
                $errors['errors'] = true;
            }

            $pageTitle = "Ajouter un nouvel article";
            
            $this->render(['formPost'], compact('pageTitle', 'errors'));
        } else {
            header('Location: index.php?action=login');
            exit;
        }
    }
    
    public function editPost() {
        if (isset($_SESSION['user'])) {
            if (isset($_GET['id'])) {
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
                        $postsManager->updatePost($_POST['post_title'], $_POST['post_content'], $_GET['id']);

                        header('Location: index.php?action=listPostsAdmin');
                        exit;
                    }
                } else {
                    $errors['errors'] = true;
                }

                $pageTitle = "Modifier l'article";
                
                $this->render(['formPost'], compact('pageTitle', 'post', 'errors'));
            }
        } else {
            header('Location: index.php?action=login');
            exit;
        }
    }
    
    public function deletePost() {
        if (isset($_SESSION['user'])) {
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $postsManager = new PostsManager();
                $postsManager->deletePost($_GET['id']);
                
                $commentsManager = new CommentsManager();
                $commentsManager->deleteComments($_GET['id']);
                
                echo json_encode(["success", "post"]);
                exit;
            } else {
                echo json_decode(["idUndefined", "post"]);
            }
        } else {
            echo json_encode(["notConnected", "post"]);
        }
    }
}
