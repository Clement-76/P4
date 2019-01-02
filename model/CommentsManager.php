<?php

namespace ClementPatigny\Model;

class CommentsManager extends Manager {
    /**
     * returns the comments of a post in an array
     * @param  integer $postId  id of the post
     * @param  string $orderBy the way to order the comments, by date or by number of reports
     * @return array[Comment] the comments objects
     */
    public function getPostComments($postId, $orderBy) {
        $db = $this->connectDb();
        if ($orderBy == 'date') {
            $q = $db->prepare('SELECT * FROM comments WHERE post_id = ? ORDER BY creation_date DESC');
        } else {
            $q = $db->prepare('SELECT * FROM comments WHERE post_id = ? ORDER BY nb_reports DESC');
        }
        
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
    
    /**
     * returns all the comments in an array
     * @return array[Comment] the comments objects
     */
    public function getComments() {
        $db = $this->connectDb();
        $q = $db->prepare('SELECT * FROM comments ORDER BY nb_reports DESC');
        $q->execute();
        
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
    
    /**
     * returns the number of comments of a post
     * @param  integer $postId the id of the post
     * @return integer the number of comments
     */
    public function getNbPostComments($postId) {
        $db = $this->connectDb();
        $q = $db->prepare('SELECT COUNT(*) AS nb_comments FROM comments WHERE post_id = ?');
        $q->execute([$postId]);
        $nbComments = $q->fetch();
        
        return $nbComments;
    }
    
    /**
     * add a new comment
     * @param string $pseudo  the author of the comment
     * @param string $comment the comment
     * @param integer $postId  the post id
     */
    public function addComment($pseudo, $comment, $postId) {
        $db = $this->connectDb();
        $q = $db->prepare('INSERT INTO comments(author, content, post_id) VALUES(:pseudo, :comment, :postId)');
        $q->bindValue(':pseudo', $pseudo, \PDO::PARAM_STR);
        $q->bindValue(':comment', $comment, \PDO::PARAM_STR);
        $q->bindValue(':postId', $postId, \PDO::PARAM_INT);
        $q->execute();
    }
    
    /**
     * delete the comment
     * @param integer $commentId the id of the comment
     */
    public function deleteComment($commentId) {
        $db = $this->connectDb();
        $q = $db->prepare('DELETE FROM comments WHERE id = ?');
        $q->execute([$commentId]);
    }
    
    /**
     * delete all the comments from a post
     * @param integer $postId the id of the post
     */
    public function deleteComments($postId) {
        $db = $this->connectDb();
        $q = $db->prepare('DELETE FROM comments WHERE post_id = ?');
        $q->execute([$postId]);
    }
    
    /**
     * add 1 to the current number of reports of the comment
     * @param integer $commentId the id of comment
     */
    public function updateNbReportsComment($commentId) {
        $db = $this->connectDb();
        $q = $db->prepare('UPDATE comments SET nb_reports = nb_reports + 1 WHERE id = ?');
        $q->execute([$commentId]);
    }
    
    /**
     * return 1 if the comment exists or 0 if he doesn't exist
     * @param  integer $commentId the id of comment
     * @return integer the number of lines
     */
    public function getNbCommentLines($commentId) {
        $db = $this->connectDb();
        $q = $db->prepare('SELECT COUNT(*) AS nb_lines FROM comments WHERE id = ?');
        $q->execute([$commentId]);
        $data = $q->fetch();
        $nbLines = $data['nb_lines'];
        
        return $nbLines;
    }
}
