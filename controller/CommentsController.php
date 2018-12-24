<?php

namespace ClementPatigny\Controller;

use ClementPatigny\Model\CommentsManager;

class CommentsController {
//    public function listComments() {
//        $commentsManager = new CommentsManager();
//        $comments = $commentsManager->getComments();
//
//        require_once "view/comment.php";
//    }
    
    public function addComment() {
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
        
    }
    
    public function reportComment() {
        
    }
}