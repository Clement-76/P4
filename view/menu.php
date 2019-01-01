<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <?php if (!isset($_GET['action'])): ?>
        <link rel="stylesheet" href="public/css/home.css">
    <?php endif; ?>
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
                <?php if (!isset($_SESSION['user'])): ?>
                    <li><a href="index.php?action=login">ADMIN</a></li>
                <?php else: ?>
                    <li><a href="index.php?action=listPostsAdmin">ARTICLES</a></li>
                    <li><a href="index.php?action=listComments">COMMENTAIRES</a></li>
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
    