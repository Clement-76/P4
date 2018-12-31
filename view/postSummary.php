<div class="container">
    <section id="blog">
        <?php foreach($posts as $post): ?>

        <article>
            <h2><?= $post->getTitle() ?></h2>
            <div><?= $this->getSummary(strip_tags($post->getContent())) ?></div>
            <a href="index.php?action=viewPost&id=<?= $post->getId() ?>">Voir l'article</a>
            <div class="italic">
                Publié par <strong><?= $post->getAuthor() ?></strong>
                le <time datetime="<?= $post->getCreationDate('Y-m-d') ?>"><?= $post->getCreationDate('d/m/Y') ?></time>
            </div>
            <div><i class="fas fa-comment"></i> <?= $post->getNbComments() ?></div>
        </article>

        <?php endforeach; ?>
    </section>
