<?php foreach($articles as $article) : ?>

<article>
    <h2><?= $article->getTitle() ?></h2>
    <div><?= getSummary($article->getContent()) ?></div>
    <a href="index.php?action=viewArticle&id=<?= $article->getId() ?>">Voir l'article</a>
    <div>
        Publié par <a href="index.php?action=viewAutor"><?= $article->getAutor() ?></a>
        le <time datetime="<?= $article->getCreationDate()->format('Y-m-d') ?>"><?= $article->getCreationDate()->format('d/m/Y') ?></time>
        <p><a href="index.php?action=editArticle&id=<?= $article->getId() ?>">Modifier l'article</a> <a href="index.php?action=deleteArticle&id=<?= $article->getId() ?>">Supprimer l'article</a></p>
    </div>
</article>

<?php endforeach; ?>
