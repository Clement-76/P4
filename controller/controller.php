<?php

require_once("model/articleManager.php");

function listArticles () {
    require_once("view/menu.php");
    require_once("view/home.php");
    require_once("view/script.php");
    
    $articlesManager = new ClementPatigny\Model\ArticleManager();
    $articles = $articlesManager->getArticles();
    
    require_once("view/articleSummary.php");
}

function viewArticle ($idArticle) {
    $articlesManager = new ClementPatigny\Model\ArticleManager();
    $article = $articlesManager->getArticle($idArticle);
    
    require_once("view/article.php");
}
