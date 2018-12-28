<section id="blog">
    <?php foreach($posts as $post) : ?>

    <article>
        <h2><?= $post->getTitle() ?></h2>
        <div><?= $this->getSummary(strip_tags($post->getContent())) ?></div>
        <a href="index.php?action=viewPost&id=<?= $post->getId() ?>">Voir l'article</a>
        <div>
            Publié par <a href="index.php?action=viewAutor"><?= $post->getAuthor() ?></a>
            le <time datetime="<?= $post->getCreationDate('Y-m-d') ?>"><?= $post->getCreationDate('d/m/Y') ?></time>
            <span><i class="fas fa-comment"></i> <?= $post->getNbComments() ?></span>
        </div>
    </article>

    <?php endforeach; ?>
</section>
