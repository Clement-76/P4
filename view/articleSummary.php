<?php
foreach($articles as $article) {
    $date = $article->getCreationDate();
    $datetime = date('Y-m-d', strtotime($date));
?>

<article>
    <h2><?= $article->getTitle() ?></h2>
    <div><?= $article->getSummary() ?></div>
    <a href="index.php?action=viewArticle&id=<?= $article->getId() ?>">Voir l'article</a>
    <div>
        Publié par <a href="index.php?action=viewAutor"><?= $article->getAutor() ?></a>
        le <time datetime="<?= $datetime ?>"><?= $date ?></time>
    </div>
</article>

<?php
}
?>
