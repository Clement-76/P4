    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="public/js/menu.js"></script>
    <script src="public/js/cookies.js"></script>
        
    <?php if (isset($_GET['action']) && in_array($_GET['action'], ['addPost', 'editPost'])): ?>
        <script src='https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=knwhkdyj7obl21ppqlgio0v11zpqcoji6j9l3oko98x46506'></script>
        <script src="public/js/tinymce.js"></script>
        <script src="public/js/fr_FR.js"></script>
    <?php endif; ?>
    
    <?php if (isset($_GET['action']) && in_array($_GET['action'], ['listPostsAdmin', 'listPostComments', 'listComments', 'viewPost'])): ?>
        <script src="public/js/delete.js"></script>
    <?php endif; ?>
    
    <?php if (isset($_GET['action']) && $_GET['action'] == 'listComments'): ?>
        <script src="public/js/comments.js"></script>
    <?php endif; ?>
    
    <?php if (isset($_GET['action']) && $_GET['action'] == 'viewPost'): ?>
        <script src="public/js/report.js"></script>
    <?php endif; ?>
    
    <?php if (!isset($_GET['action'])): ?>
        <script src="public/js/home.js"></script>
    <?php endif; ?>
</body>

</html>
