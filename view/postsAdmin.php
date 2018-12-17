<h1>Administration des articles</h1>
<a href="index.php?action=addPost">Ajouter un article</a>

<table>
    <thead>
        <tr>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Date</th>
            <th colspan="2">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($posts as $post) : ?>
            <tr>
                <td><?= $post->getTitle() ?></td>
                <td><?= $post->getAuthor() ?></td>
                <td><?= $post->getCreationDate()->format('d/m/Y') ?></td>
                <td><a href="index.php?action=editPost&id=<?= $post->getId() ?>">Modifier</a></td>
                <td><a href="index.php?action=deletePost&id=<?= $post->getId() ?>">Supprimer</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
