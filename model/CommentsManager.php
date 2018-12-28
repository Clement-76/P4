<?php

namespace ClementPatigny\Model;

class CommentsManager extends Manager {
    public function getComments($postId) {
        $db = $this->connectDb();
        $q = $db->prepare('SELECT comments.id, comments.content, comments.creation_date, nb_reports, author FROM comments INNER JOIN posts ON comments.post_id = posts.id WHERE comments.post_id = ? ORDER BY creation_date DESC');
        $q->execute([$postId]);
        $comments = [];
        
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
    
    public function getNbPostComments($postId) {
        $db = $this->connectDb();
        $q = $db->prepare('SELECT COUNT(*) AS nb_comments FROM comments WHERE post_id = ?');
        $q->execute([$postId]);
        $nbComments = $q->fetch();
        
        return $nbComments;
    }
    
    public function addComment($pseudo, $comment, $postId) {
        $db = $this->connectDb();
        $q = $db->prepare('INSERT INTO comments(author, content, post_id) VALUES(:pseudo, :comment, :postId)');
        $q->bindValue(':pseudo', $pseudo, \PDO::PARAM_STR);
        $q->bindValue(':comment', $comment, \PDO::PARAM_STR);
        $q->bindValue(':postId', $postId, \PDO::PARAM_INT);
        $q->execute();
    }
    
    public function deleteComment($commentId) {
        $db = $this->connectDb();
        $q = $db->prepare('DELETE FROM comments WHERE id = ?');
        $q->execute([$commentId]);
    }
    
    public function updateNbReportsComment($commentId) {
        $db = $this->connectDb();
        $q = $db->prepare('UPDATE comments SET nb_reports = nb_reports + 1 WHERE id = ?');
        $q->execute([$commentId]);
    }
    
    public function getNbCommentLines($commentId) {
        $db = $this->connectDb();
        $q = $db->prepare('SELECT COUNT(*) AS nb_lines FROM comments WHERE id = ?');
        $q->execute([$commentId]);
        $data = $q->fetch();
        $nbLines = $data['nb_lines'];
        
        return $nbLines;
    }
}
