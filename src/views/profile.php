<main class="container login">
    <form action="?action=profile" method="post">
        <div class="champs">
            <label for="userId">Pseudo :</label>
            <input type="text" name="userId" id="userId" value="<?php echo $_SESSION['userId']; ?> " disabled>
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
            <button class="bouttonViolet" type="submit">Modifier</button>
            <button class="bouttonViolet last">Supprimer</button>
        </div>
        
    </form>
</main>