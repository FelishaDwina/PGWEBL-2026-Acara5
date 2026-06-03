@extends('layouts.template')
@section('styles')
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel ="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>

        #map {
            height: calc(100vh - 56px);
        }
    </style>
@endsection

@section('content')
<div id="map"></div>
<!-- Modal form edit  -->
<div class="modal" tabindex="-1" id="modalEdit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('polyline.update', $id) }}" method="post"
      enctype="multipart/form-data">
        @csrf
        @method('PATCH')
      <div class="modal-body">
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Isi nama garis">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="geometry" class="form-label">Geometry</label>
            <textarea class="form-control" id="geometry_polyline" name="geometry_polyline" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input class="form-control" type="file" id="image" name="image"
            onchange="document.getElementById('preview-image').src = window.URL.createObjectURL(this.files[0])">
            <img src="" alt="" id="preview-image" class="img-thumbnail" width="400">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
<script src="https://unpkg.com/@terraformer/wkt"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
var map = L.map('map').setView([-7.7956, 110.3695], 13);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; OpenStreetMap'
}).addTo(map);

/* Digitize Function */
var drawnItems = new L.FeatureGroup();
map.addLayer(drawnItems);

var drawControl = new L.Control.Draw({
	draw: false,
	edit: {
		featureGroup: drawnItems,
		edit: true,
		remove: false
	}
});
map.addControl(drawControl);

map.on('draw:edited', function(e) {
	var layers = e.layers;

	layers.eachLayer(function(layer) {
		var drawnJSONObject = layer.toGeoJSON();
		console.log(drawnJSONObject);

		var objectGeometry = Terraformer.geojsonToWKT(drawnJSONObject.geometry);
		console.log(objectGeometry);

		// layer properties
		var properties = drawnJSONObject.properties;
		console.log(properties);

		drawnItems.addLayer(layer);

        //mengisi form edit
        $('#name').val(properties.name);
        $('#description').val(properties.description);
        $('#geometry_polyline').val(objectGeometry);
        $('#preview-image').attr('src', "{{asset('storage/images')}}/"+ properties.image);

        //menampilkan modal edit
        $('#modalEdit').modal('show');

	});
});

//point layer
var polylines = L.geoJSON(null, {
	// Style

	// onEachFeature
    onEachFeature: function (feature, layer) {

        //memasukkan layer ke dalam drawnItems agar bisa diedit
        drawnItems.addLayer(layer);

        var properties = feature.properties;
        var objectGeometry = Terraformer.geojsonToWKT(feature.geometry);

        layer.on({
            click: function (e) {
                //mengisi form edit
                $('#name').val(properties.name);
                $('#description').val(properties.description);
                $('#geometry_polyline').val(objectGeometry);
                $('#preview-image').attr('src', "{{asset('storage/images')}}/"+ properties.image);

                //menampilkan modal edit
                $('#modalEdit').modal('show');

            },
        });
    },
});

$.getJSON("{{route('geojson.polyline', $id)}}", function(data) {
	polylines.addData(data);
	map.addLayer(polylines);
});

// Control Layer
var baseMaps = {

};

var overlayMaps = {
	"Points": points,
	"Polylines": polylines,
	"Polygons": polygons,
};

var controllayer = L.control.layers(baseMaps, overlayMaps);
controllayer.addTo(map);
</script>

@endsection
