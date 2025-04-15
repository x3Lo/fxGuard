<main class="container login">
    <h1>Modification du profil</h1>
    <form action="./?action=profileEdit" method="post">
    <div class="champs">
            <label for="userName">Pseudo :</label>
            <input type="text" name="userName" id="userName" value="<?php echo $_SESSION['userName']; ?>">
        </div>
        <div class="champs">
            <label for="emaile">Email :</label>
            <input type="email" name="emaile" id="emaile" value="<?php echo $_SESSION['email']; ?>">
        </div>
        <button class="bouttonViolet">Appliquer</button>
    </form>
</main>