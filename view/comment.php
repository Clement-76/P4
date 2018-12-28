<?php foreach($comments as $comment): ?>
    <div class="comments">
        <!-- mettre 3 points verticaux pour les options supprimer/signaler -->
        <a href="index.php?action=reportComment&commentId=<?= $comment->getId() ?>&postId=<?= $_GET['id'] ?>">Signaler</a>
        <?php if (isset($_SESSION['user'])): ?>
            <a href="index.php?action=deleteComment&commentId=<?= $comment->getId() ?>&postId=<?= $_GET['id'] ?>">Supprimer</a>
        <?php endif; ?>
        <p><span><?= $comment->getAuthor() ?></span> <span>Le <?= $comment->getCreationDate('d/m/Y') . ' à ' . $comment->getCreationDate('h:m:s')?></span></p>
        <p><?= $comment->getContent() ?></p>
    </div>
<?php endforeach; ?>
