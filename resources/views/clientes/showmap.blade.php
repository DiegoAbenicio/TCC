@include('layout')

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mapa</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="">
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <style>
		.leaflet-container {
			height: 35rem;
			width: 100%;
		}
	</style>

    <link type="text/css" rel="stylesheet" charset="UTF-8" href="https://translate.googleapis.com/translate_static/css/translateelement.css">
</head>
<body>



    <script>
        var map = L.map('map').setView([-20.4674546, -45.4264695], 15);
        var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var marker = L.marker([-20.4674546, -45.4264695]).addTo(map);
        var bh = L.marker([-20.453811, -45.443750]).addTo(map);
        var insf = L.marker([-20.452392, -45.438667]).addTo(map);
        var unifor = L.marker([-20.457169, -45.451113]).addTo(map);
        var rodov = L.marker([-20.467646, -45.432048]).addTo(map);
        var matriz = L.marker([-20.464209, -45.426481]).addTo(map);
        var cristo = L.marker([-20.457353, -45.432668]).addTo(map);
        var santacasa = L.marker([-20.461450, -45.424841]).addTo(map);

        var popup = L.popup();

        function onMapClick(e) {
            popup
            .setLatLng(e.latlng)
            .setContent("As coordenadas referente a este local são: " + e.latlng.toString())
            .openOn(map);
        }

        map.on('click', onMapClick);

        marker.bindPopup("<b>Você está aqui!</b><br>Sede da Mimos.").openPopup();
        bh.bindPopup("Supermercado BH");
        insf.bindPopup("Instituto Federal MG Formiga");
        unifor.bindPopup("Unifor");
        rodov.bindPopup('Rodoviaria Nova');
        matriz.bindPopup('Igreja Matriz São Vicente');
        santacasa.bindPopup('Santa Casa');
        cristo.bindPopup('Cristo Formiga');

    </script>
</body>
</html>
