<main class="container login">
    <h1>Poster un commentaire</h1>
    <form action="?action=comment" method="post">
        <div class="champs">
            <label for="note">Note :</label>
            <input type="number" id="note" name="note" placeholder="Entrez un nombre entre 0 et 10" require>
        </div>
        <div class="champs">
            <label for="comment">Contenu :</label>
            <textarea name="comment" id="comment" placeholder="Ecrivez votre commentaire"></textarea>
        </div>
        <button class="bouttonViolet" type="submit">Poster</button>
    </form>
</main>