<h1><?= 'Commentaires - ' . $post->getTitle() ?></h1>

<table>
    <thead>
        <tr>
            <th>Commentaire</th>
            <th>Auteur</th>
            <th>Signalements</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($comments as $comment): ?>
            <tr>
                <td><?= $comment->getContent() ?></td>
                <td><?= $comment->getAuthor() ?></td>
                <td><?= $comment->getNbReports() ?></td>
                <td><?= $comment->getCreationDate('d/m/Y à h:m:s') ?></td>
                <td><a href="index.php?action=deleteComment&commentId=<?= $comment->getId() ?>&postId=<?= $post->getId() ?>" class="delete">Supprimer</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
