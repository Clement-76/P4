<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if (isset($description) && !empty($description)): ?>
        <meta name="description" content="<?= $description ?>">
    <?php endif; ?>
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <link rel="icon" type="image/png" href="public/images/alaska_mountain.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">
    <?php if (isset($_GET['action']) && $_GET['action'] == 'login'): ?>
        <link rel="stylesheet" href="public/css/login.css">
    <?php endif; ?>
    <?php if (!isset($_GET['action'])): ?>
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="public/css/home.css">
    <?php endif; ?>
    <?php if (isset($_GET['action']) && $_GET['action'] == 'viewPost'): ?>
        <link rel="stylesheet" href="public/css/post.css">
    <?php endif; ?>
</head>

<body>

    <aside>
        <div class="close">
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
    
    <?= $content ?>
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="public/js/menu.js"></script>
    <script src="public/js/cookies.js"></script>
        
    <?php if (isset($_GET['action']) && in_array($_GET['action'], ['addPost', 'editPost'])): ?>
        <script src='https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=knwhkdyj7obl21ppqlgio0v11zpqcoji6j9l3oko98x46506'></script>
        <script src="public/js/tinymce.js"></script>
        <script src="public/js/fr_FR.js"></script>
    <?php endif; ?>
    
    <?php if (isset($_GET['action']) && in_array($_GET['action'], ['listPostsAdmin', 'listPostComments', 'listComments', 'viewPost'])): ?>
        <script src="public/js/statusMessage.js"></script>
        <script src="public/js/delete.js"></script>
    <?php endif; ?>
    
    <?php if (isset($_GET['action']) && $_GET['action'] == 'listComments'): ?>
        <script src="public/js/commentsAdmin.js"></script>
    <?php endif; ?>
    
    <?php if (isset($_GET['action']) && $_GET['action'] == 'viewPost'): ?>
        <script src="public/js/report.js"></script>
        <script src="public/js/formComment.js"></script>
        <script src="public/js/progress.js"></script>
    <?php endif; ?>
    
    <?php if (!isset($_GET['action'])): ?>
        <script src="public/js/home.js"></script>
    <?php endif; ?>
</body>

</html>
