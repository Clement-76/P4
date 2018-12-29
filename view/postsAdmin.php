<h1>Administration des articles</h1>
<a href="index.php?action=addPost">Ajouter un article</a>

<table>
    <thead>
        <tr>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Commentaires</th>
            <th>Date</th>
            <th colspan="2">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($posts as $post): ?>
            <tr>
                <td><?= $post->getTitle() ?></td>
                <td><?= $post->getAuthor() ?></td>
                <td>
                    <?php if ($post->getNbComments() == 0): ?>
                        <?= $post->getNbComments() ?>
                    <?php else: ?>
                        <a href="index.php?action=listPostComments&id=<?= $post->getId() ?>"><?= $post->getNbComments() ?></a>
                    <?php endif; ?>
                    <i class="fas fa-comment"></i>
                </td>
                <td><?= $post->getCreationDate('d/m/Y') ?></td>
                <td><a href="index.php?action=editPost&id=<?= $post->getId() ?>">Modifier</a></td>
                <td><a href="index.php?action=deletePost&commentId=<?= $post->getId() ?>" class="delete_post">Supprimer</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
