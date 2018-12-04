<?php
while ($data = $articles->fetch()) {
?>

<article>
    <h2><?= htmlspecialchars($data['title']) ?></h2>
    <div><?= htmlspecialchars($data['content']) ?></div>
</article>

<?php
}
?>
