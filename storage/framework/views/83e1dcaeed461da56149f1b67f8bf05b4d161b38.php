<?php $__env->startSection('content'); ?>



<div class="card shadow mb-4">

    <div class="card-body">
        <div class="row" >
            <div class="col-lg-12 margin-tb">
                <div class="container">
                <div id="calendar"></div>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('agenda.agenda', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Area de Trabalho\Wallpapers\cadastro\TCC\resources\views/index.blade.php ENDPATH**/ ?>