<form id="newComment" method="post" action="index.php?action=addComment">
    <input id="pseudo" type="text" name="pseudo" placeholder="Entrez votre pseudo" maxlength="100" required>
    <input type="text" name="comment" placeholder="Entrez votre commentaire" required>
    <input type="hidden" name="post_id" value="<?= $post->getId() ?>">
    <input type="submit" value="Poster">
</form>