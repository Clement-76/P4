<?php

namespace ClementPatigny\Controller;

use ClementPatigny\Model\CommentsManager;

class CommentsController {
    
    public function addComment() {
        // verifier si le post existe
        $errors['errors'] = false;
        
        if (!isset($_POST['comment']) || empty($_POST['comment'])) {
            $errors['errors'] = true;
            $errors['comment'] = true;
        }
        
        if (!isset($_POST['pseudo']) || empty($_POST['pseudo'])) {
            $errors['errors'] = true;
            $errors['pseudo'] = true;
        }
        
        if (!isset($_POST['post_id']) || empty($_POST['post_id'])) {
            $errors['errors'] = true;
            $errors['post_id'] = true;
        }
        
        if (!$errors['errors']) {
            $commentsManager = new CommentsManager();
            $commentsManager->addComment($_POST['pseudo'], $_POST['comment'], $_POST['post_id']);
            header('Location: index.php?action=viewPost&id=' . $_POST['post_id']);
            exit;
        } 
    }
    
    public function deleteComment() {
        // supprimer le cookie correspondant au commentaire s'il est définit
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
                }
            } else {
                if ($nbLines == 1) {
                    $commentsManager->updateNbReportsComment($_GET['commentId']);
                    setcookie('reportsComments', serialize([$_GET['commentId']]), time() + 30 * 24 * 3600, null, null, false, true);
                }
            }
            
            if (isset($_GET['postId']) && !empty($_GET['postId'])) {
                header('Location: index.php?action=viewPost&id=' . $_GET['postId']);
            } else {
                header('Location: index.php#blog');
            }
        }
    }
}
