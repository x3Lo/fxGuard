<main class="container" id="creator">

    <a href="./?action=configList">Retourner en arrière</a>

    <form action="?action=configCreator" method="post">
        <label for="listName">Nom de la configuration :</label><br>
        <input type="text" id="listName" name="listName"><br>
        <label for="themeName">Theme :</label><br>
        <select name="themeName" id="themeName"><br>
            <?php
            foreach ($themes as $theme) {
                echo '<option value="' . $theme['themeName'] . '">' . $theme['themeName'] . '</option>';
            } ?>
        </select><br>
        <label for="share">Partager la configuration :</label>
        <input type="checkbox" name="share" id="share"><br>
        <button class="bouttonViolet" type="submit">Créer une configuration</button>
    </form>
</main>