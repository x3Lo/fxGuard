<main class="container">
    <h1>Configuration List</h1>
    <div>
        <ul>
            <li><a href="./?action=configCreator">Crée une configuration</a></li>
            <li><a href="./?action=configShare">Configurations partagées</a></li>
        </ul>
    </div>
    <h2>Configurations :</h2>
    <?php

    require_once RACINE . '/src/models/request.php';


    foreach ($configsList as $configList) { ?>
        <p>Id : <?php echo $configList['listConfigId'] ?></p>
        <p>Nom : <?php echo $configList['listName'] ?></p>
        <p>Theme : <?php echo $configList['themeName'] ?></p>
        <p>Auteur : <?php echo $configList['userName'] ?></p>
        <a class="bouttonViolet" href="?action=configView&configListId=<?php echo $configList['listConfigId'] ?>">Modifier</a>
        <form action="?action=configListRemove" method="post">
            <input id="listConfigId" name="listConfigId" value="<?php echo $configList['listConfigId'] ?>" hidden>
            <button class="bouttonViolet last">Supprimer</button>
        </form>
    <?php } ?>

</main>