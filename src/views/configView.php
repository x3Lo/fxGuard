<main class="container" id="view">
    <a href="./?action=configList">Retourner en arrière</a>

    <div id="configName">
        <h2>Nom de la configuration : <?php echo $configs[0]['listName'] ?></h2>
        <h3>Catégorie : <?php echo $configs[0]['themeName'] ?></h3>
        <h4>Confidentialité : <?php echo $share ?></h4>
        <h4>Auteur : <?php echo $configs[0]['userName'] ?></h4>
    </div>


    <section>
        <?php
        if (isset($configs[0]['vehiculeName'])) {
            foreach ($configs as $config) {
                if ($config['userId'] == $_SESSION['userId']) { ?>
                    <article>
                        <img src="<?php echo $config['vehiculeImage'] ?>" alt="Un(e) <?php echo $config['vehiculeName'] ?>, vehicule GTA 5.">
                        <p>Nom : <?php echo $config['vehiculeName'] ?></p>
                        <p>Marque : <?php echo $config['vehiculeBrand'] ?></p>
                        <p>Type : <?php echo $config['vehiculeType'] ?></p>
                        <p>Accélération : <?php echo $config['vehiculeAcceleration'] ?></p>
                        <p>Vittesse max : <?php echo $config['vehiculeTopSpeed'] ?> km/h</p>
                        <p>Maniabilité : <?php echo $config['vehiculeHandling'] ?></p>
                        <p>Place(s) : <?php echo $config['vehiculeSeat'] ?></p>
                        <form action="?action=configRemove" method="post">
                            <input id="vehiculeId" name="vehiculeId" value="<?php echo $config['vehiculeId'] ?>" hidden>
                            <button class="bouttonViolet">Supprimer</button>
                        </form>
                    </article>
                <?php } else { ?>
                    <article>
                        <img src="<?php echo $config['vehiculeImage'] ?>" alt="Un(e) <?php echo $config['vehiculeName'] ?>, vehicule GTA 5.">
                        <p>Nom : <?php echo $config['vehiculeName'] ?></p>
                        <p>Marque : <?php echo $config['vehiculeBrand'] ?></p>
                        <p>Type : <?php echo $config['vehiculeType'] ?></p>
                        <p>Accélération : <?php echo $config['vehiculeAcceleration'] ?></p>
                        <p>Vittesse max : <?php echo $config['vehiculeTopSpeed'] ?> km/h</p>
                        <p>Maniabilité : <?php echo $config['vehiculeHandling'] ?></p>
                        <p>Place(s) : <?php echo $config['vehiculeSeat'] ?></p>
                    </article>

                <?php } ?>
            <?php
            }
        } else { ?>
            <p>Aucun vehicule ajouté.</p>
        <?php } ?>
    </section>

    <?php if ($configs[0]['userId'] == $_SESSION['userId']) { ?>
        <h2><button class="bouttonViolet" id="loadScriptButton">Ajouter des vehicules</button></h2>
        <input type="text" id="search" placeholder="Rechercher un véhicule...">
        <ul id="vehicle-list"></ul>
    <?php } ?>

</main>