<main class="container" id="creator">
    <h1>Créer sa configuration</h1>

    <a href="./?action=configList">Retourner en arrière</a>

    <form action="?action=configCreator" method="post">
        <label for="listName">Nom de la configuration :</label><br>
        <input type="text" id="listName" name="listName" placeholder="Nom de la configuration"><br>
        <label for="themeName">Theme :</label><br>
        <select name="themeName" id="themeName"><br>
            <?php
            foreach ($themes as $theme) {
                echo '<option value="' . $theme['themeName'] . '">' . $theme['themeName'] . '</option>';
            } ?>
        </select><br>
        <div id="ptg">
            <label for="share">Partager la configuration :</label>
            <input type="checkbox" name="share" id="share"><br>
        </div>

        <button class="bouttonViolet" type="submit">Créer une configuration</button>
    </form>
</main>