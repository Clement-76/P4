<?php 

namespace ClementPatigny\Model;

use ClementPatigny\Model\CommentsManager;

class PostsManager extends Manager {
    /**
     * returns all the posts in an array of objects
     * @return array[Post] the array of objects
     */
    public function getPosts() {
        $db = $this->connectDb();
        $q = $db->query("SELECT posts.id, title, content, user_pseudo, creation_date FROM posts INNER JOIN users ON posts.author_id = users.id ORDER BY creation_date DESC");
        $posts = [];
        
        while ($post = $q->fetch()) {
            $commentsManager = new CommentsManager();
            $nbComments = $commentsManager->getNbPostComments($post['id']);
            
            $postFeatures = [
                'content' => $post['content'],
                'title' => $post['title'],
                'id' => $post['id'],
                'nbComments' => $nbComments['nb_comments'],
                'author' => $post['user_pseudo'],
                'creationDate' => $post['creation_date']
            ];
            
            $posts[] = new Post($postFeatures);
        }
        
        return $posts;
    }
    
    /**
     * returns the post
     * @param  integer $postId the id of the post
     * @return object the post object
     */
    public function getPost($postId) {
        $db = $this->connectDb();
        $q = $db->prepare("SELECT posts.*, user_pseudo FROM posts INNER JOIN users ON posts.author_id = users.id WHERE posts.id = ?");
        $q->execute([$postId]);
        $post = $q->fetch();
        
        $commentsManager = new CommentsManager();
        $nbComments = $commentsManager->getNbPostComments($postId);

        $postFeatures = [
            'content' => $post['content'],
            'title' => $post['title'],
            'nbComments' => $nbComments['nb_comments'],
            'id' => $post['id'],
            'author' => $post['user_pseudo'],
            'creationDate' => $post['creation_date']
        ];
        
        $postObj = new Post($postFeatures);
        return $postObj;
    }
    
    /**
     * add a new post
     * @param array $post the array that contains the title, content and authorId of the post
     */
    public function addPost(array $post) {
        $db = $this->connectDb();
        $q = $db->prepare('INSERT INTO posts(title, content, author_id) VALUE(?, ?, ?)');
        $q->execute([$post['title'], $post['content'], $post['authorId']]);
    }
    
    /**
     * update a post
     * @param string $title   the title of the post
     * @param string $content the content of post
     * @param integer $postId  the id of the post
     */
    public function updatePost($title, $content, $postId) {
        $db = $this->connectDb();
        $q = $db->prepare('UPDATE posts SET title = ?, content = ? WHERE id = ?');
        $q->execute([$title, $content, $postId]);
    }
        
    /**
     * delete the post
     * @param integer $postId the id of the post
     */
    public function deletePost($postId) {
        $db = $this->connectDb();
        $q = $db->prepare('DELETE FROM posts WHERE id = ?');
        $q->execute([$postId]);
    }
    
    /**
     * returns 1 if the post exists or 0 if he doesn't exist
     * @param  integer $postId the id of the post
     * @return integer the number of lines
     */
    public function getNbPostLines($postId) {
        $db = $this->connectDb();
        $q = $db->prepare('SELECT COUNT(*) AS nb_lines FROM posts WHERE id = ?');
        $q->execute([$postId]);
        $data = $q->fetch();
        $nbLines = $data['nb_lines'];
        
        return $nbLines;
    }
}
