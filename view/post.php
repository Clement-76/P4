<div class="progress"></div>

<article id="post" class="center">
    <h1><?= $post->getTitle() ?></h1>
    <div><?= $post->getContent() ?></div>
    <div class="italic">
        Publié par <strong><?= $post->getAuthor() ?></strong>
        le <time datetime="<?= $post->getCreationDate('Y-m-d') ?>"><?= $post->getCreationDate('d/m/Y') ?></time>
    </div>
</article>
