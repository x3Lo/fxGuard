<h1>Register</h1>
<form action="?action=register" method="post">
    <label for="userId">Pseudo :</label>
    <input type="text" id="userId" name="userId" value=<?php echo $_POST["userId"] ?? ''?>>
    <br>
    <label for="email">E-mail :</label>
    <input type="email" id="email" name="email" value=<?php echo $_POST["email"] ?? ''?>>
    <br>
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" value=<?php echo $_POST["password"] ?? ''?>>
    <!-- <input type="password" id="password" name="password" required> -->
    <br>
    <button type="submit">S'Inscrire</button>
</form>