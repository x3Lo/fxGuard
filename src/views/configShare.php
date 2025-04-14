<main class="container" id="share">
    <h1>Configuration Share</h1>
    <a href="./?action=configList">Retourner en arrière</a>
    <br><br>

    <?php

    require_once RACINE . '/src/models/request.php';

    // var_dump($noteMoyenne);
    // exit;

    ?>
    <section>
        <?php foreach ($configsList as $configList) { ?>
            <article>
                <!-- <p>Id : <?php echo $configList['listConfigId'] ?></p> -->
                <h3>Nom : <?php echo $configList['listName'] ?></h3>
                <h4>Theme : <?php echo $configList['themeName'] ?></h4>
                <p>Auteur : <?php echo $configList['userId'] ?></p>

                <?php if ($configList['userId'] == $_SESSION['userId']) { ?>
                    <a class="bouttonViolet" href="?action=configView&configListId=<?php echo $configList['listConfigId'] ?>">Modifier</a>
                <?php } else { ?>
                    <a class="bouttonViolet" href="?action=configView&configListId=<?php echo $configList['listConfigId'] ?>">Voir</a>
                <?php } ?>

                
                <?php foreach ($allMoyennes[$configList['listConfigId']] as $moyenne) { ?>
                    <?php var_dump($moyenne) ?>
                    <h3><?= $moyenne['AVG(commentNote'] ?></h3>
                <?php } ?>

                <h3>Commentaire(s) :</h3>
                <?php foreach ($allComments[$configList['listConfigId']] as $comment) { ?>
                    <!-- <?php var_dump($comment) ?> -->
                    <p>Note : <?= $comment['commentNote'] ?>/10</p>
                    <p>Commentaire : <?= $comment['commentContent'] ?></p>
                    <p>Autheur : <?= $comment['userId'] ?></p>
                    <p>Publié le <?= $comment['createAt'] ?></p>
                    <br>
                <?php } ?>


            </article>
        <?php } ?>
    </section>

</main>