<article>
    <h1><?= $post->getTitle() ?></h1>
    <div><?= $post->getContent() ?></div>
</article>

<form method="post" action="index.php?action=addComment">
    <input type="text" name="pseudo" placeholder="Entrez votre pseudo">
    <input type="text" name="comment" placeholder="Entrez votre commentaire">
    <input type="hidden" name="post_id" value="<?= $post->getId() ?>">
    <input type="submit" value="Poster">
</form>
