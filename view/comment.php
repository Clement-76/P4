<?php foreach($comments as $comment): ?>
    <div class="comments">
        <a href="index.php?action=reportComment&commentId=<?= $comment->getId() ?>" class="report">Signaler</a>
        <p class="italic"><b><?= $comment->getAuthor() ?></b> <span>Le <?= $comment->getCreationDate('d/m/Y') . ' à ' . $comment->getCreationDate('H:i:s')?></span></p>
        <p><?= $comment->getContent() ?></p>
    </div>
<?php endforeach; ?>
