<?php

namespace ClementPatigny\Model;

class CommentsManager extends Manager {
    public function getComments() {
        $db = $this->connectDb();
        $q = $db->prepare('');
        $q->execute();
    }
    
    public function addComment($pseudo, $comment, $postId) {
        $db = $this->connectDb();
        $q = $db->prepare('INSERT INTO comments(author, content, post_id) VALUES(:pseudo, :comment, :postId)');
        $q->bindValue(':pseudo', $pseudo, \PDO::PARAM_STR);
        $q->bindValue(':comment', $comment, \PDO::PARAM_STR);
        $q->bindValue(':postId', $postId, \PDO::PARAM_INT);
        $q->execute();
    }
    
    public function deleteComment() {
        $db = $this->connectDb();
        $q = $db->prepare('');
        $q->execute();
    }
    
    
    public function reportComment() {
        $db = $this->connectDb();
        $q = $db->prepare('');
        $q->execute();
    }
}
