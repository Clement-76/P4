<?php foreach($posts as $post) : ?>

<article>
    <h2><?= $post->getTitle() ?></h2>
    <div><?= $this->getSummary($post->getContent()) ?></div>
    <a href="index.php?action=viewPost&id=<?= $post->getId() ?>">Voir l'article</a>
    <div>
        Publié par <a href="index.php?action=viewAutor"><?= $post->getAutor() ?></a>
        le <time datetime="<?= $post->getCreationDate()->format('Y-m-d') ?>"><?= $post->getCreationDate()->format('d/m/Y') ?></time>
    </div>
</article>

<?php endforeach; ?>
