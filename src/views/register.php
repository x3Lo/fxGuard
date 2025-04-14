<main class="container login">
    <h2>Veuillez remplir ce formulaire pour vous inscrire : </h2>
    <form action="?action=register" method="post">
        <div class="champs">
            <label for="userId">Pseudo :</label>
            <input type="text" id="userId" name="userId" value="<?php echo $_POST["userId"] ?? '' ?>" placeholder="Votre Pseudo" required>
        </div>
        <div class="champs">
            <label for="email">E-mail :</label>
            <input type="email" id="email" name="email" value="<?php echo $_POST["email"] ?? '' ?>" placeholder="Votre Email" required>
        </div>
        <div class="champs">
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" value="<?php echo $_POST["password"] ?? '' ?>" placeholder="Votre mot de passe" required>
        </div>
        <button class="bouttonViolet" type="submit">S'Inscrire</button>
    </form>
</main>