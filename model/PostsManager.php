<?php 

namespace ClementPatigny\Model;

use ClementPatigny\Model\CommentsManager;

class PostsManager extends Manager {
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
    
    public function getPost($postId) {
        $db = $this->connectDb();
        $q = $db->prepare("SELECT posts.*, users.user_pseudo FROM posts INNER JOIN users ON posts.author_id = users.id WHERE posts.id = ?");
        $q->execute([$postId]);
        $post = $q->fetch();

        $postFeatures = [
            'content' => $post['content'],
            'title' => $post['title'],
            'id' => $post['id'],
            'author' => $post['user_pseudo'],
            'creationDate' => $post['creation_date']
        ];
        
        $postObj = new Post($postFeatures);
        return $postObj;
    }
    
    public function addPost(array $post) {
        $db = $this->connectDb();
        $q = $db->prepare('INSERT INTO posts(title, content, author_id) VALUE(?, ?, ?)');
        $q->execute([$post['title'], $post['content'], $post['authorId']]);
    }
    
    public function updatePost($title, $content, $postId) {
        $db = $this->connectDb();
        $q = $db->prepare('UPDATE posts SET title = ?, content = ? WHERE id = ?');
        $q->execute([$title, $content, $postId]);
    }
        
    public function deletePost($postId) {
        $db = $this->connectDb();
        $q = $db->prepare('DELETE FROM posts WHERE id = ?');
        $q->execute([$postId]);
    }
    
    public function getNbPostLines($postId) {
        $db = $this->connectDb();
        $q = $db->prepare('SELECT COUNT(*) AS nb_lines FROM posts WHERE id = ?');
        $q->execute([$postId]);
        $data = $q->fetch();
        $nbLines = $data['nb_lines'];
        
        return $nbLines;
    }
}
