<h1>Configuration Creator</h1>
<a href="./?action=configList">Retourner en arrière</a>
<br><br><br>

<form action="?action=configCreator" method="post">
    <label for="listName">Nom de la configuration :</label>
    <input type="text" id="listName" name="listName">
    <label for="themeName">Theme :</label>
    <select name="themeName" id="themeName">
        <?php
        foreach($themes as $theme) {
            echo '<option value="'.$theme['themeName'].'">'.$theme['themeName'].'</option>';
        } ?>
    </select>
    <label for="share">Partager la configuration :</label>
    <input type="checkbox" name="share" id="share">
    <button type="submit">Créer une configuration</button>
</form>

