<?php $__env->startSection('content'); ?>

<!--<div style="width: 100%; height: 35rem" id="mapContainer"></div>-->
<div id="map"></div>
<div class="card shadow mb-4">
    <div class="form-group col-md-6">
        <strong>Escolha o Dia:</strong>
                <form>
                    <div>
                        <label for="dia" class="form-group col-md-7">Escolha a data desejada para gerar a rota:</label>
                        <input type="date" id="dia" name="dia" class="form-group ">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
        </datalist>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('mapa.showmap', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Area de Trabalho\Wallpapers\cadastro\CadastroFuncionando_\resources\views/mapa/index.blade.php ENDPATH**/ ?>