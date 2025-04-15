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
                <h3>Nom : <?php echo $configList['listName'] ?></h3>
                <h4>Theme : <?php echo $configList['themeName'] ?></h4>
                <p>Auteur : <?php echo $configList['userName'] ?></p>

                <?php if ($configList['userId'] == $_SESSION['userId']) { ?>
                    <a class="bouttonViolet" href="?action=configView&configListId=<?php echo $configList['listConfigId'] ?>">Modifier</a>
                <?php } else { ?>
                    <a class="bouttonViolet" href="?action=configView&configListId=<?php echo $configList['listConfigId'] ?>">Voir</a>
                <?php } ?>

                <?php if (isset($allMoyennes[$configList['listConfigId']][0]['AVG(commentNote)'])) { ?>
                    <div id="comment">
                        <?php foreach ($allMoyennes[$configList['listConfigId']] as $moyenne) { ?>
                            <h4>Notes Moyennes : <?= $moyenne['AVG(commentNote)'] ?>/10</h4>
                        <?php } ?>
                        <h4>Commentaire(s) :</h4>
                        <section>
                            <?php foreach ($allComments[$configList['listConfigId']] as $comment) { ?>
                                <article>
                                    <p>Note : <?= $comment['commentNote'] ?>/10</p>
                                    <p>Commentaire : <?= $comment['commentContent'] ?></p>
                                    <p>Autheur : <?= $comment['userName'] ?></p>
                                    <p>Publié le <?= $comment['createAt'] ?></p>
                                </article>
                            <?php } ?>
                        </section>
                    </div>
                <?php } ?>
                <a class="bouttonViolet last" href="./?action=comment&configListId=<?php echo $configList['listConfigId'] ?>">Poster un commentaire</a>
            </article>
        <?php } ?>
    </section>

</main>