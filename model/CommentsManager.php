<?php

namespace ClementPatigny\Model;

class CommentsManager extends Manager {
    public function getComments($postId) {
        $db = $this->connectDb();
        $q = $db->prepare('SELECT comments.id, comments.content, comments.creation_date, nb_reports, author FROM comments INNER JOIN posts ON comments.post_id = posts.id WHERE comments.post_id = ?');
        $q->execute([$postId]);
        
        while ($comment = $q->fetch()) {
            
            $commentFeatures = [
                'content' => $comment['content'],
                'author' => $comment['author'],
                'id' => $comment['id'],
                'nbReports' => $comment['nb_reports'],
                'creationDate' => $comment['creation_date']
            ];
            
            $comments[] = new Comment($commentFeatures);
        }
        
        return $comments;
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
