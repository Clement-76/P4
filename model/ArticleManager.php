<?php 

namespace ClementPatigny\Model;

require("Manager.php");

class ArticleManager extends Manager {
    public function getArticles() {
        $db = $this->connectDb();
        $q = $db->query("SELECT title, content FROM articles");
        return $q;
    }
}
