function initialize() {
    $('form').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });

    const input = document.getElementById('address-input');
    const addressField = document.getElementById('address');
    const latitudeField = document.getElementById('address-latitude');
    const longitudeField = document.getElementById('address-longitude');

    // Initialiser la carte avec les coordonnées existantes si disponibles
    const initialLat = latitudeField.value || 51.5074;
    const initialLng = longitudeField.value || -0.1278;

    const map = new google.maps.Map(document.getElementById('address-map'), {
        center: { lat: parseFloat(initialLat), lng: parseFloat(initialLng) },
        zoom: 13
    });

    const marker = new google.maps.Marker({
        map: map,
        position: { lat: parseFloat(initialLat), lng: parseFloat(initialLng) }
    });

    const autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    // S'assurer que l'adresse initiale est dans le champ caché
    if (input.value) {
        addressField.value = input.value;
    }

    autocomplete.addListener('place_changed', function() {
        marker.setVisible(false);
        const place = autocomplete.getPlace();

        if (!place.geometry) {
            window.alert("Aucun détail disponible pour : '" + place.name + "'");
            return;
        }

        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }

        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        // Mise à jour des champs
        addressField.value = place.formatted_address;
        latitudeField.value = place.geometry.location.lat();
        longitudeField.value = place.geometry.location.lng();
    });

    // Gérer les changements manuels de l'adresse
    input.addEventListener('change', function() {
        addressField.value = input.value;
    });
}