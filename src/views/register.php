<main class="container login">
    <form action="?action=register" method="post">
        <div class="champs">
            <label for="userId">Pseudo :</label>
            <input type="text" id="userId" name="userId" value="<?php echo $_POST["userId"] ?? '' ?>" required>
        </div>
        <div class="champs">
            <label for="email">E-mail :</label>
            <input type="email" id="email" name="email" value="<?php echo $_POST["email"] ?? '' ?>" required>
        </div>
        <div class="champs">
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" value="<?php echo $_POST["password"] ?? '' ?>" required>
        </div>
        <button type="submit">S'Inscrire</button>
    </form>
</main>