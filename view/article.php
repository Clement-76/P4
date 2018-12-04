<?php
while ($data = $article->fetch()) {
?>

<h1><?= htmlspecialchars($data['title']) ?></h1>
<div><?= htmlspecialchars($data['content']) ?></div>

<?php
}
?>