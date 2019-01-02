<?php

namespace ClementPatigny\Controller;

use ClementPatigny\Model\CommentsManager;
use ClementPatigny\Model\PostsManager;
use ClementPatigny\Controller\AppController;

class CommentsController extends AppController {
    
    /**
     * list the comments of a post
     */
    public function listPostComments() {
        if (isset($_SESSION['user'])) {
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $postsManager = new PostsManager();
                $post = $postsManager->getPost($_GET['id']);

                $commentsManager = new CommentsManager();
                $comments = $commentsManager->getPostComments($_GET['id'], 'reports');
                
                $pageTitle = 'Commentaires - ' . $post->getTitle();
                
                $this->render(['commentsAdmin'], compact('pageTitle', 'post', 'comments'));
            } else {
                header('Location: index.php?action=listPostsAdmin');
            }
        } else {
            header('Location: index.php?action=login');
            exit;
        }
    }
    
    /**
     * list all the comments in the admin panel
     */
    public function listComments() {
        if (isset($_SESSION['user'])) {
                $commentsManager = new CommentsManager();
                $comments = $commentsManager->getComments();
                
                $pageTitle = 'Administration des commentaires';
                
                $this->render(['commentsAdmin'], compact('comments', 'pageTitle'));
        } else {
            header('Location: index.php?action=login');
            exit;
        }
    }
    
    public function addComment() {
        $errors = false;
        
        if (!isset($_POST['comment']) || empty($_POST['comment'])) {
            $errors = true;
        }
        
        if (!isset($_POST['pseudo']) || empty($_POST['pseudo'])) {
            $errors = true;
        }
        
        if (!isset($_POST['post_id']) || empty($_POST['post_id'])) {
            $errors = true;
        } else {
            $postsManager = new PostsManager();
            $nbLines = $postsManager->getNbPostLines($_POST['post_id']);
            
            if ($nbLines != 1) {
                $errors = true;
            }
        }
        
        if (!$errors) {
            $commentsManager = new CommentsManager();
            $commentsManager->addComment($_POST['pseudo'], $_POST['comment'], $_POST['post_id']);
        }
        
        header('Location: index.php?action=viewPost&id=' . $_POST['post_id']);
        exit;
    }
    
    public function deleteComment() {
        if (isset($_SESSION['user'])) {
            if (isset($_GET['commentId']) && !empty($_GET['commentId'])) {
                $commentsManager = new CommentsManager();
                $commentsManager->deleteComment($_GET['commentId']);
                
                echo "success";
            } else {
                echo "idUndefined";
            }
        } else {
            echo "notConnected";
        }
    }
    
    public function reportComment() {
        if (isset($_GET['commentId']) && !empty($_GET['commentId'])) {
            
            $commentsManager = new CommentsManager();
            $nbLines = $commentsManager->getNbCommentLines($_GET['commentId']);

            if (isset($_COOKIE['reportsComments']) && is_array(unserialize($_COOKIE['reportsComments']))) {
                $value = unserialize($_COOKIE['reportsComments']);

                if (!in_array($_GET['commentId'], $value)) {

                    if ($nbLines == 1) {
                        $commentsManager->updateNbReportsComment($_GET['commentId']);
                        $value[] = $_GET['commentId'];
                        setcookie('reportsComments', serialize($value), time() + 30 * 24 * 3600, null, null, false, true);
                    }
                } else {
                    echo "alreadyReport";
                    exit;
                }
            } else {
                if ($nbLines == 1) {
                    $commentsManager->updateNbReportsComment($_GET['commentId']);
                    setcookie('reportsComments', serialize([$_GET['commentId']]), time() + 30 * 24 * 3600, null, null, false, true);
                }
            }
            echo "success";
        } else {
            echo "idUndefined";
        }
    }
}
