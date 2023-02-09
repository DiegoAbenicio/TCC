<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body" id="mapid"></div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>

<style>
    #mapid { min-height: 500px; }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>

<script>
    var map = L.map('mapid').setView([<?php echo e(config('leaflet.map_center_latitude')); ?>, <?php echo e(config('leaflet.map_center_longitude')); ?>], <?php echo e(config('leaflet.zoom_level')); ?>);
    var baseUrl = "<?php echo e(url('/')); ?>";
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    axios.get('<?php echo e(route('api.OutletController')); ?>')
    .then(function (response) {
        console.log(response.data);
        L.geoJSON(response.data, {
            pointToLayer: function(geoJsonPoint, latlng) {
                return L.marker(latlng);
            }
        })
        .bindPopup(function (layer) {
            return layer.feature.properties.map_popup_content;
        }).addTo(map);
    })
    .catch(function (error) {
        console.log(error);
    });
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', new App\Outlet)): ?>
    var theMarker;
    map.on('click', function(e) {
        let latitude = e.latlng.lat.toString().substring(0, 15);
        let longitude = e.latlng.lng.toString().substring(0, 15);
        if (theMarker != undefined) {
            map.removeLayer(theMarker);
        };
        var popupContent = "Your location : " + latitude + ", " + longitude + ".";
        popupContent += '<br><a href="<?php echo e(route('outlets.create')); ?>?latitude=' + latitude + '&longitude=' + longitude + '">Add new outlet here</a>';
        theMarker = L.marker([latitude, longitude]).addTo(map);
        theMarker.bindPopup(popupContent)
        .openPopup();
    });
    <?php endif; ?>
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Area de Trabalho\Wallpapers\cadastro\CadastroFuncionando_\resources\views/outlets/map.blade.php ENDPATH**/ ?>