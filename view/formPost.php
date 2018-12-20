<h1><?= $pageTitle ?></h1>
<form method="post">
    <p>
        <label for="post_title">Titre de l'article :</label><br>
        <input id="post_title" name="post_title" type="text" required value="<?php if (isset($post)) { echo $post->getTitle(); } ?>">
        <?php if (isset($errors['post_title'])): ?>
            <br><span>Veuillez entrer le titre de l'article</span>
        <?php endif; ?>
    </p>
    <p>
        <textarea name="post_content" id="post_content">
            <?php if (isset($post)) { echo $post->getContent(); } ?>
        </textarea>
        <?php if (isset($errors['post_content'])): ?>
            <span>Veuillez entrer le contenu de l'article</span>
        <?php endif; ?>
    </p>
    <p>
        <input type="submit" value="Publier">
    </p>
</form>