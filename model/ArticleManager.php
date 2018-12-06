<?php 

namespace ClementPatigny\Model;

require_once("model/Manager.php");
require_once("model/Article.php");

class ArticleManager extends Manager {
    public function getArticles() {
        $db = $this->connectDb();
        $q = $db->query("SELECT * FROM articles ORDER BY creation_date DESC");
        $articles = [];
        
        while ($article = $q->fetch()) {
            $articleFeatures = [
                'content' => $article['content'],
                'title' => $article['title'],
                'id' => $article['id'],
                'autor' => $article['autor'],
                'creationDate' => $article['creation_date']
            ];
            
            $articles[] = new Article($articleFeatures);
        }
        
        return $articles;
    }
    
    public function getArticle($idArticle) {
        $db = $this->connectDb();
        $q = $db->prepare("SELECT * FROM articles WHERE id = ?");
        $q->execute(array($idArticle));
        $article = $q->fetch();

        $articleFeatures = [
            'content' => $article['content'],
            'title' => $article['title'],
            'id' => $article['id'],
            'autor' => $article['autor'],
            'creationDate' => $article['creation_date']
        ];
        
        $article = new Article($articleFeatures);
        return $article;
    }
}
