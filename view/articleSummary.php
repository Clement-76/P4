<?php
while ($article = $articles->fetch()) {
    $content = htmlspecialchars($article['content']);
    $words = explode(" ", $content);
    $summary = "";
    
    if (count($words) < 25) {
        $summary = $content;
    } else {
        for ($i = 0; $i < 24; $i++) {
            if ($i == 23) {
                $summary .= $words[$i] . '...';
            } else {
                $summary .= $words[$i] . ' ';
            }
        }
    }
?>

<article>
    <h2><?= htmlspecialchars($article['title']) ?></h2>
    <div><?= $summary ?></div>
    <a href="index.php?action=viewArticle&id=<?= $article['id'] ?>">Voir l'article</a>
</article>

<?php
}
?>
