<?php foreach($comments as $comment): ?>
    <div class="comments">
        <!-- mettre 3 points verticaux pour les options supprimer/signaler -->
        <a href="index.php?action=reportComment&id=<?= $comment->getId() ?>">Signaler</a>
        <p><span><?= $comment->getAuthor() ?></span> <span><?= $comment->getCreationDate() ?></span></p>
        <p><?= $comment->getContent() ?></p>
    </div>
<?php endforeach; ?>
