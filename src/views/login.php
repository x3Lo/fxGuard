<h1>Login</h1>
<form action="?action=login" method="post">
    <label for="login">Pseudo :</label>
    <input type="text" id="login" name="login" value=<?php echo $_POST["login"] ?? ''?>>
    <br>
    <label for="password">Mot de passe (hashed_password1) :</label>
    <input type="password" id="password" name="password" value=<?php echo $_POST["password"] ?? ''?>>
    <!-- <input type="password" id="password" name="password" required> -->
    <br>
    <button type="submit">Se connecter</button>
</form>