<footer>
    <div id="navFooter">
        <ul>
            <li><a href="./?action=default">Accueil</a></li>
            <li><a href="./?action=contact">Contact</a></li>
            <?php
            if (isset($_SESSION['userId'])) {
            ?>
                <li><a href="./?action=configList">Configurations</a></li>
                <?php if ($_SESSION['role'] == 'admin') { ?>
                    <li><a href="./?action=admin">Administration</a></li>
                <?php } ?>
                <li><a href="./?action=profile">Profil</a></li>
                <li><a href="?action=logout">Se déconnecter</a></li>
            <?php
            } else {
            ?>
                <li><a href="./?action=login">Se Connecter</a></li>
                <li><a href="./?action=register">S'Inscrire</a></li>
            <?php
            }
            ?>
        </ul>
    </div>
    <div id="footer2">
        <ul>
            <li><a href="#">© 2024 - fxGuard - Tous droits réservés</a></li>
            <li><a href="./?action=mentions-legales">Mentions légale</a></li>
            <li><a href="./?action=confidentialite">Politique de confidentialité</a></li>
            <li><a href="https://github.com/x3Lo">Designed by Edern FERLICOT</a></li>
        </ul>
    </div>
</footer>
</body>

</html>