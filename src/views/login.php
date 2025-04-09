<main class="container login">
    <form action="?action=login" method="post">
        <div class="champs">
            <label for="login">Pseudo : </label>
            <input type="text" id="login" name="login" value="<?php echo $_POST["login"] ?? '' ?>" required>
        </div>
        <div class="champs">
            <label for=" password">Mot de passe :</label>
            <input type="password" id="password" name="password" value="<?php echo $_POST["password"] ?? '' ?>" required>
        </div>
        <button class="bouttonViolet" type="submit">Se connecter</button>
    </form>
</main>