// On attend que le DOM soit complètement chargé
    document.addEventListener("DOMContentLoaded", function() {
        // Cibler l'élément contenant le message
        let msgElement = document.querySelector('.msg');

        if (msgElement) {
            // Ajouter la classe 'show' pour faire apparaître le message en douceur
            msgElement.classList.add('show');

            // Après 3 secondes, appliquer la transition pour faire disparaître le message
            setTimeout(function() {
                msgElement.classList.add('hide'); // Ajoute la classe 'hide' pour disparaître progressivement
            }, 2500); // 3000 millisecondes = 3 secondes (temps avant de commencer à disparaître)

            // Après la transition de disparition (4 secondes au total), cacher complètement le message
            setTimeout(function() {
                msgElement.remove(); // Supprime l'élément du DOM
            }, 3000); // 4000 millisecondes (1 seconde après la fin de la transition de disparition)
        }
    });