<?php 

namespace ClementPatigny\Model;

class PostsManager extends Manager {
    public function getPosts() {
        $db = $this->connectDb();
        $q = $db->query("SELECT * FROM posts ORDER BY creation_date DESC");
        $posts = [];
        
        while ($post = $q->fetch()) {
            $postFeatures = [
                'content' => $post['content'],
                'title' => $post['title'],
                'id' => $post['id'],
                'author' => $post['author'],
                'creationDate' => $post['creation_date']
            ];
            
            $posts[] = new Post($postFeatures);
        }
        
        return $posts;
    }
    
    public function getPost($idPost) {
        $db = $this->connectDb();
        $q = $db->prepare("SELECT * FROM posts WHERE id = ?");
        $q->execute(array($idPost));
        $post = $q->fetch();

        $postFeatures = [
            'content' => $post['content'],
            'title' => $post['title'],
            'id' => $post['id'],
            'author' => $post['author'],
            'creationDate' => $post['creation_date']
        ];
        
        $postObj = new Post($postFeatures);
        return $postObj;
    }
}
