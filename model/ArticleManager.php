<?php 

namespace ClementPatigny\Model;

require_once("model/Manager.php");

class ArticleManager extends Manager {
    public function getArticles() {
        $db = $this->connectDb();
        $q = $db->query("SELECT id, title, content FROM articles ORDER BY id DESC");
        return $q;
    }
    
    public function getArticle($idArticle) {
        $db = $this->connectDb();
        $q = $db->prepare("SELECT title, content FROM articles WHERE id = ?");
        $q->execute(array($idArticle));
        return $q;
    }
}
