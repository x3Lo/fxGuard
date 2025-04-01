<h1>Profile</h1>
<form action="?action=profile" method="post">
    <label for="userId">Pseudo :</label>
    <input type="text" name="userId" id="userId" value="<?php echo $_SESSION['userId']; ?> " disabled>
    <br>
    <label for="email">Email :</label>
    <input type="email" name="email" id="email" value="<?php echo $_SESSION['email']; ?> " disabled>
    <br>
    <label for="privilege">Role :</label>
    <p><?php echo $_SESSION['privilege']; ?></p>
    <label for="date">Date de création du compte :</label>
    <p><?php echo $formattedDate; ?></p>
    <button type="submit">Modifier</button>
</form>