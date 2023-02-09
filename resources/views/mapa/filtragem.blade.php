@extends('mapa.showmap')
@section('content')

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


<!--<div style="width: 100%; height: 35rem" id="mapContainer"></div>-->
<div id="map"></div>
<div class="card shadow mb-4">
    <div class="form-row col-xs-12 col-sm-12 col-md-12">

    
    </div>



    <div class="form-group col-md-12">
        <strong>Você está indo buscar os seguintes animais:</strong>
        <table class="table table-bordered">
            <tr>
                <th>Endereco</th>
                <th>Nome do Dono</th>
                <th>Telefone</th>
                <th>Nome do Animal</th>
            </tr>
            @foreach ($events as $key => $value)
                <tr>
                    <td>{{ $value->animal->dono->endereco }}</td>
                    <td>{{ $value->animal->dono->nome }}</td>
                    <td>{{ $value->animal->dono->telefone }}</td>
                    <td>{{ $value->animal->nome }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

<script>
        var map = L.map('map').setView([-20.4674546, -45.4264695], 15);
        var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var marker = L.marker([-20.4674546, -45.4264695]).addTo(map);

        var events = @json($events);


        var coordenadas = [];
        events.forEach(function(event) {
            coordenadas.push(event.animal.dono.coordenadas);
        });

        L.Routing.control({
        waypoints: [
            L.latLng(-20.4674546, -45.4264695),
            ...coordenadas.map(function(coordenada) {
            var latLng = coordenada.split(',');
            var latitude = parseFloat(latLng[0]);
            var longitude = parseFloat(latLng[1]);
            return L.latLng(latitude, longitude);
            }),
            L.latLng(-20.4674546, -45.4264695),
        ]
        }).addTo(map);

        autoRoute();

        marker.bindPopup("<b>Você está aqui!</b><br>Sede da Mimos.").openPopup();

</script>


@endsection
