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
            $comment = htmlspecialchars($_POST['comment']);
            // replaces multiple line breaks by one line break
            $comment = preg_replace("#(\n|\r)+#", "\n", $comment);
            $comment = preg_replace("#(.+)(\n)*#", "<p>$1</p>", $comment);
            
            $commentsManager = new CommentsManager();
            $commentsManager->addComment($_POST['pseudo'], $comment, $_POST['post_id']);
        }
        
        header('Location: index.php?action=viewPost&id=' . $_POST['post_id'] . '#comments');
        exit;
    }
    
    public function deleteComment() {
        if (isset($_SESSION['user'])) {
            if (isset($_GET['commentId']) && !empty($_GET['commentId'])) {
                $commentsManager = new CommentsManager();
                $commentsManager->deleteComment($_GET['commentId']);
                
                echo json_encode(["success", "comment"]);
            } else {
                echo json_encode(["idUndefined", "comment"]);
            }
        } else {
            echo json_encode(["notConnected", "comment"]);
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
                    echo json_encode(["alreadyReport", "comment"]);
                    exit;
                }
            } else {
                if ($nbLines == 1) {
                    $commentsManager->updateNbReportsComment($_GET['commentId']);
                    setcookie('reportsComments', serialize([$_GET['commentId']]), time() + 30 * 24 * 3600, null, null, false, true);
                }
            }
            echo json_encode(["success", "comment"]);
        } else {
            echo json_encode(["idUndefined", "comment"]);
        }
    }
}
