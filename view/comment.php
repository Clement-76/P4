<?php foreach($comments as $comment): ?>
    <div class="comments">
        <!-- mettre 3 points verticaux pour les options supprimer/signaler -->
        <a href="index.php?action=reportComment&commentId=<?= $comment->getId() ?>&postId=<?= $_GET['id'] ?>">Signaler</a>
        <p><span><?= $comment->getAuthor() ?></span> <span><?= $comment->getCreationDate('d/m/Y') ?></span></p>
        <p><?= $comment->getContent() ?></p>
    </div>
<?php endforeach; ?>
