<h1>Administration des articles</h1>
<a id="add_post" href="index.php?action=addPost">Ajouter un article</a>

<table>
    <thead>
        <tr>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Commentaires</th>
            <th>Date</th>
            <th><i class="far fa-edit"></i></th>
            <th><i class="far fa-trash-alt"></i></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($posts as $post): ?>
            <tr>
                <td><?= $post->getTitle() ?><i class="fas fa-caret-down"></i></td>
                <td class="author"><?= $post->getAuthor() ?></td>
                <td class="nb_comments">
                    <?php if ($post->getNbComments() == 0): ?>
                        <span><i class="fas fa-comment"></i> 0</span>
                    <?php else: ?>
                        <a href="index.php?action=listPostComments&id=<?= $post->getId() ?>"><i class="fas fa-comment"></i> <?= $post->getNbComments() ?></a>
                    <?php endif; ?>
                </td>
                <td class="date"><?= $post->getCreationDate('d/m/Y') ?></td>
                <td class="td_edit"><a href="index.php?action=editPost&id=<?= $post->getId() ?>" class="edit">Modifier <i class="far fa-edit"></i></a></td>
                <td class="td_delete"><a href="index.php?action=deletePost&id=<?= $post->getId() ?>" class="delete">Supprimer <i class="far fa-trash-alt"></i></a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
