<?php $__env->startSection('content'); ?>

<link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet">


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Inserindo Serviços</h6>
    </div>
    <div class="card-body">

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Adicionar uma nova Tarefa</h2>
        </div>
    </div>
</div>

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>


<form class ="was-validated" action ="<?php echo e(route ('servicos.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>

     <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome da Tarefa:</strong>
                <input type="text" name="title" class="form-control is-valid" placeholder="Entre com o nome"required>
            </div>
            <div class="form-group">
                <strong>Duração:</strong>
                <input type="time" name="duracao" class="form-control is-valid" placeholder="Entre com o id do Dono"required>
            </div>
        </div>

        <div class="form-row col-xs-12 col-sm-12 col-md-12">

            <div class="form-group col-md-6">
                <strong>Cor da Letra</strong>
                <input type="color" name="textColor" class="form-control is-valid" required>
            </div>

             <div class="form-group col-md-6 ">
                <strong>Cor do Fundo:</strong>
                <input type="color" name="color" class="form-control is-valid" required>
            </div>

        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a class="btn btn-danger" href="<?php echo e(route('servicos.index')); ?>"> Voltar </a>
                <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>

</form>
</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Area de Trabalho\Wallpapers\cadastro\TCC\resources\views/servicos/create.blade.php ENDPATH**/ ?>