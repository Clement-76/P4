<?php

use ClementPatigny\Model\ArticleManager;

function listArticles() {
    $articlesManager = new ArticleManager();
    $articles = $articlesManager->getArticles();
    $pageTitle = "Billet simple pour l'Alaska";
    
    require_once "view/menu.php";
    require_once "view/home.html";
    require_once "view/articleSummary.php";
    require_once "view/script.html";
}

function getSummary($content) {
    $words = explode(" ", $content);
    $summary = "";

    if (count($words) < 25) {
        $summary = $content;
    } else {
        for ($i = 0; $i < 25; $i++) {
            if ($i == 24) {
                $summary .= $words[$i] . '...';
            } else {
                $summary .= $words[$i] . ' ';
            }
        }
    }
    
    return $summary;
}

function viewArticle($idArticle) {
    $articlesManager = new ArticleManager();
    $article = $articlesManager->getArticle($idArticle);
    $pageTitle = $article->getTitle();
    
    require_once "view/menu.php";
    require_once "view/article.php";
    require_once "view/script.html";
}
