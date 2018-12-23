<?php 

namespace ClementPatigny\Model;

class PostsManager extends Manager {
    public function getPosts() {
        $db = $this->connectDb();
        $q = $db->query("SELECT * FROM posts INNER JOIN users ON posts.author_id = users.id ORDER BY creation_date DESC");
        $posts = [];
        
        while ($post = $q->fetch()) {
            $postFeatures = [
                'content' => $post['content'],
                'title' => $post['title'],
                'id' => $post['id'],
                'author' => $post['user_pseudo'],
                'creationDate' => $post['creation_date']
            ];
            
            $posts[] = new Post($postFeatures);
        }
        
        return $posts;
    }
    
    public function getPost($postId) {
        $db = $this->connectDb();
        $q = $db->prepare("SELECT * FROM posts INNER JOIN users ON posts.author_id = users.id WHERE posts.id = ?");
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
    
    public function addPost(Post $post) {
        $db = $this->connectDb();
        $q = $db->prepare('INSERT INTO posts(title, content) VALUE(?, ?)');
        $q->execute([$post->getTitle(), $post->getContent()]);
    }
    
    public function editPost($title, $content, $postId) {
        $db = $this->connectDb();
        $q = $db->prepare('UPDATE posts SET title = ?, content = ? WHERE id = ?');
        $q->execute([$title, $content, $postId]);
    }
        
    public function deletePost($postId) {
        $db = $this->connectDb();
        $q = $db->prepare('DELETE FROM posts WHERE id = ?');
        $q->execute([$postId]);
    }
}
