<section id="comments" class="center">
    <h2>Commentaires</h2>

    <form id="newComment" method="post" action="index.php?action=addComment">
        <p>
            <input id="pseudo" type="text" name="pseudo" placeholder="Entrez votre pseudo" maxlength="100" required>
        </p>
        <p>
            <textarea name="comment" cols="50" rows="5" placeholder="Entrez votre commentaire" required></textarea>
        </p>
        <p>
            <input type="hidden" name="post_id" value="<?= $post->getId() ?>">
        </p>
        <input type="submit" value="Poster">
    </form>

    <?php foreach($comments as $comment): ?>
        <div class="comment">
            <p>
                <b><?= $comment->getAuthor() ?></b>
                <span>-</span>
                <span class="date">Le <?= $comment->getCreationDate('d/m/Y') . ' à ' . $comment->getCreationDate('H\hi')?></span>
                <a href="index.php?action=reportComment&commentId=<?= $comment->getId() ?>" class="report">Signaler</a>
            </p>
            <div><?= $comment->getContent() ?></div>
        </div>
    <?php endforeach; ?>
</section>
