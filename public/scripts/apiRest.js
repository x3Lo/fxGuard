const URL = 'https://gta.vercel.app/api/vehicles/all'

fetch(URL)
    .then(response => {
        if (response.ok) {
            console.log('Requête réussie - Statut : ' + response.status)
            return (response.json())
        }
        throw new Error('Erreur d\'accès à la ressource - Statut : ' + response.status)
    })
    .then(jsonData => updateDom(jsonData))
    .catch(erreur => console.error(erreur))


function updateDom(data) {
    let ulElement = document.querySelector('ul#vehicle-list');

    // Parcourir chaque catégorie dans l'objet data (boats, commercial, compacts, etc.)
    for (let categoryKey in data) {
        const vehicles = data[categoryKey];  // Chaque catégorie (boats, commercial, etc.)

        // Ajouter un titre pour la catégorie
        let categoryHeader = document.createElement('h3');
        categoryHeader.textContent = categoryKey.charAt(0).toUpperCase() + categoryKey.slice(1); // Capitaliser le premier caractère
        ulElement.appendChild(categoryHeader);

        // Parcourir tous les véhicules dans cette catégorie
        for (let vehicleKey in vehicles) {
            const vehicle = vehicles[vehicleKey];

            let liElement = document.createElement('li');

            // Afficher les informations sur le véhicule
            liElement.innerHTML =
                '<img src="' + vehicle.images.frontQuarter + '" alt="Front Quarter">' + 
                '<h4>' + vehicle.model + ' (' + vehicleKey + ')</h4>' +
                '<p>Manufacturer: ' + vehicle.manufacturer + '</p>' +
                '<p>Seats: ' + vehicle.seats + '</p>' +
                '<p>Top Speed: ' + (vehicle.topSpeed ? vehicle.topSpeed.kmh : 'N/A') + ' km/h (' + (vehicle.topSpeed ? vehicle.topSpeed.mph : 'N/A') + ' mph)</p>' +
                '<p>Speed: ' + (vehicle.speed !== undefined ? vehicle.speed : 'N/A') + ' km/h</p>' +
                '<p>Acceleration: ' + (vehicle.acceleration !== undefined ? vehicle.acceleration : 'N/A') + '</p>' +
                '<p>Handling: ' + (vehicle.handling !== undefined ? vehicle.handling : 'N/A') + '</p>' +
                '<form action="?action=configAdd" method="post">' +
                '<input id="name" name="name" value="' + vehicle.model + '" hidden>' +
                '<input id="brande" name="brande" value="' + vehicle.manufacturer + '" hidden>' +
                '<input id="type" name="type" value="' + categoryKey + '" hidden>' +
                '<input id="image" name="image" value="' + vehicle.images.frontQuarter + '" hidden>' +
                '<input id="acceleration" name="acceleration" value="' + (vehicle.acceleration !== undefined ? vehicle.acceleration : 'N/A') + '" hidden>' +
                '<input id="topSpeed" name="topSpeed" value="' + (vehicle.topSpeed ? vehicle.topSpeed.kmh : 'N/A') + '" hidden>' +
                '<input id="handling" name="handling" value="' + (vehicle.handling !== undefined ? vehicle.handling : 'N/A') + '" hidden>' +
                '<input id="seat" name="seat" value="' + vehicle.seats + '" hidden>' +
                '<button class="bouttonViolet" type="submit">Ajouter</button>' +
                '</form>'

            ulElement.appendChild(liElement);
        }
    }
}

