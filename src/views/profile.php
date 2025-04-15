<main class="container login">
    <h1>Profil</h1>
    <form action="?action=profile" method="post">
        <div class="champs">
            <label for="userName">Pseudo :</label>
            <input type="text" name="userName" id="userName" value="<?php echo $_SESSION['userName']; ?> " disabled>
        </div>
        <div class="champs">
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" value="<?php echo $_SESSION['email']; ?> " disabled>
        </div>
        <div class="champs">
            <label for="privilege">Role :</label>
            <p><?php echo $_SESSION['privilege']; ?></p>
        </div>
        <div class="champs">
            <label for="date">Date de création du compte :</label>
            <p><?php echo $formattedDate; ?></p>
        </div>
        <div class="bouttons">
            <a class="bouttonViolet" href="./?action=profileEdit">Modifier</a>
            <a class="bouttonViolet last" href="./?action=deleteProfile">Supprimer</a>
        </div>

    </form>
    <div id="comment">
        <h2>Commentaire(s) posté(s) :</h2>

        <section>
            <?php foreach ($comments as $comment) { ?>
                <article>
                    <p>Note : <?= $comment['commentNote'] ?></p>
                    <p>Contenu : <?= $comment['commentContent'] ?></p>
                    <p>Posté le <?= $comment['createAt'] ?></p>
                    <form action="./?action=deleteComment" method="post">
                        <input type="text" id="commentId" name="commentId" value="<?php echo $comment['commentId'] ?>" hidden>
                        <button class="bouttonViolet last">Supprimer</button>
                    </form>
                </article>
            <?php } ?>
        </section>

    </div>
</main>