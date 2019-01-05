    <footer>
        <div class="center">
            <nav>
                <ul>
                    <li><a href="#">Mentions légales</a></li>
                    <li><a href="#">Conditions générales d'utilisation</a></li>
                    <li><a href="#">Politique de confidentialité</a></li>
                </ul>
            </nav>
            <p>Copyright © <?= date('Y') ?> Tous droits réservés</p>
        </div>
    </footer>
<?php if (!isset($_GET['action'])): ?>
</div>
<?php endif; ?>