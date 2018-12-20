<form method="post">
    <p>
        <label for="user_login">Identifiant</label><br>
        <input id="user_login" type="text" name="user_login" required>
    </p>
    <p>
        <label for="user_password">Mot de passe</label><br>
        <input id="user_password" type="password" name="user_password" required>
    </p>
    <p>
        <input type="submit">
    </p>
    
    <?php if ($errors): ?>
        <p>Identifiant ou mot de passe incorrect</p>
    <?php endif; ?>
</form>
