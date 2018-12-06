<?php

require_once("model/articleManager.php");

function listArticles() {
    require_once("view/menu.html");
    require_once("view/home.html");
    require_once("view/script.html");
    
    $articlesManager = new ClementPatigny\Model\ArticleManager();
    $articles = $articlesManager->getArticles();
    
    require_once("view/articleSummary.php");
}

function viewArticle($idArticle) {
    $articlesManager = new ClementPatigny\Model\ArticleManager();
    $article = $articlesManager->getArticle($idArticle);
    
    require_once("view/article.php");
}
