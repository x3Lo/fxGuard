<main class="container" id="admin">
    <h1>Admin</h1>
    <div id="users">
        <h2>List des utilistateurs :</h2>
        <section>
            <?php foreach ($users as $user) { ?>
                <article>
                    <p>Id : <?= $user['userId'] ?></p>
                    <p>Pseudo : <?= $user['userName'] ?></p>
                    <p>Email : <?= $user['email'] ?></p>
                    <p>Role : <?= $user['role'] ?></p>
                    <p>Création du compte : <?= $user['createAt'] ?></p>
                    <?php if ($user['role'] !== 'admin') { ?>
                        <form action="./?action=upgradeUser" method="post">
                            <input type="text" id="userId" name="userId" value="<?= $user['userId'] ?>" hidden>
                            <button class="bouttonViolet">Promouvoir</button>
                        </form>
                    <?php } else { ?>
                        <form action="./?action=downgradeUser" method="post">
                            <input type="text" id="userId" name="userId" value="<?= $user['userId'] ?>" hidden>
                            <button class="bouttonViolet">Rétrograder</button>
                        </form>
                    <?php } ?>
                </article>
            <?php } ?>
        </section>
    </div>
    <div id="theme">
        <h2>Gérer les themes :</h2>
        <form action="./?action=addTheme" method="post">
            <div>
                <label for="themeName">Ajouter un theme : </label>
                <input type="text" id="themeName" name="themeName" placeholder="Nouveau theme">
            </div>
            <button class="bouttonViolet">Ajouter</button>
        </form>
        <section>
            <?php foreach ($themes as $theme) { ?>
                <article>
                    <p>Id : <?= $theme['themeId'] ?></p>
                    <p>Nom : <?= $theme['themeName'] ?></p>
                    <p>Création du compte : <?= $theme['createAt'] ?></p>
                    <form action="./?action=deleteTheme" method="post">
                        <input type="text" id="themeId" name="themeId" value="<?= $theme['themeId'] ?>" hidden>
                        <input type="text" id="themeName" name="themeName" value="<?= $theme['themeName'] ?>" hidden>
                        <button class="bouttonViolet">Supprimer</button>
                    </form>
                </article>
            <?php } ?>
        </section>
    </div>

</main>