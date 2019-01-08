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
            <th><i class="far fa-trash-alt"></i></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($comments as $comment): ?>
            <tr class="<?= ($comment->getNbReports() == 0) ? 'not_comment_report' : '' ?>">
                
                <td><?= preg_replace("#<p>(.+)<\/p>#U", " $1 ", $comment->getContent()) ?><i class="fas fa-caret-down"></i></td>
                <td class="author"><?= $comment->getAuthor() ?></td>
                <td class="nb_reports"><?= $comment->getNbReports() ?></td>
                <td class="date"><?= $comment->getCreationDate('d/m/Y à H:i:s') ?></td>
                <td><a href="index.php?action=deleteComment&commentId=<?= $comment->getId() ?>" class="delete">Supprimer <i class="far fa-trash-alt"></i></a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
