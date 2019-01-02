<?php

namespace ClementPatigny\Controller;

use ClementPatigny\Model\PostsManager;
use ClementPatigny\Model\CommentsManager;
use ClementPatigny\Model\Post;
use ClementPatigny\Controller\AppController;

class PostsController extends AppController {
    
    public function listPosts() {
        $postsManager = new PostsManager();
        $posts = $postsManager->getPosts();
        $pageTitle = "Blog - Jean Forteroche";
        
        $this->render(['home', 'postSummary', 'footer'], compact('posts', 'pageTitle'));
    }
    
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
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $postsManager = new PostsManager();
            $nbLines = $postsManager->getNbPostLines($_GET['id']);
            
            if ($nbLines == 1) {
                $post = $postsManager->getPost($_GET['id']);
                
                $commentsManager = new CommentsManager();
                $comments = $commentsManager->getPostComments($_GET['id'], 'date');
                $pageTitle = $post->getTitle();
                
                $this->render(['post', 'formComment', 'comment'], compact('post', 'comments', 'pageTitle'));
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
                
                echo "success";
                exit;
            } else {
                echo "idUndefined";
            }
        } else {
            echo "notConnected";
        }
    }
}
