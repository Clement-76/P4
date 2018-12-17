<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>

    <aside>
        <div class="close_menu">
            <div></div>
            <div></div>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">ACCUEIL</a></li>
                <li><a href="index.php?action=listPosts">BLOG</a></li>
                <li><a href="#">À PROPOS</a></li>
                <?php if (!isset($_SESSION['user'])): ?>
                    <li><a href="index.php?action=login">ADMIN</a></li>
                <?php else: ?>
                    <li><a href="index.php?action=viewAdminPanel">ADMINISTRATION</a></li>
                    <li><a href="index.php?action=logout">DECONNEXION</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </aside>
    
    <div class="overlay"></div>

    <div class="hamburger_menu">
        <div></div>
        <div></div>
        <div></div>
    </div>
    