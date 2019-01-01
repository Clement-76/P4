<?php if (isset($_GET['action']) && $_GET['action'] == 'listPostComments'): ?>
    <h1><?= 'Commentaires - ' . $post->getTitle() ?></h1>
<?php else: ?>
    <h1>Commentaires</h1>
<?php endif; ?>

<?php if (isset($_GET['action']) && $_GET['action'] == 'listComments'): ?>
    <select id="comments_selector">
        <option value="all_comments">Tous les commentaires</option>
        <option value="reports_comments">Commentaires signalés</option>
    </select>
<?php endif; ?>

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
            <tr class="<?= ($comment->getNbReports() == 0) ? 'not_comment_report' : '' ?>">
                
                <td><?= $comment->getContent() ?></td>
                <td><?= $comment->getAuthor() ?></td>
                <td><?= $comment->getNbReports() ?></td>
                <td><?= $comment->getCreationDate('d/m/Y à H:i:s') ?></td>
                <td><a href="index.php?action=deleteComment&commentId=<?= $comment->getId() ?>" class="delete">Supprimer</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
