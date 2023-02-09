<?php $__env->startSection('content'); ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Cadastro de Animais</h6>
    </div>
    <div class="card-body">


    <div class="row" style="margin-top: 0.1rem; margin-bottom: 1rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="<?php echo e(route('animais.create')); ?>"> Novo Animal</a>
            </div>
        </div>
    </div>

    <form action="" method="get">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="nome" placeholder="Pesquisar pelo nome do animal">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Pesquisar</button>
            </div>
        </div>
    </form>


    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>

    <table class="table table-bordered">
        <tr>
            <th>Nome / Id</th>
            <th>Nome do Dono</th>
            <th>Especie</th>
            <th>Raça</th>
            <th width="280px">Ações</th>
        </tr>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(empty(request()->nome) || (strpos(strtolower($value->nome), strtolower(request()->nome)) !== false)): ?>
            <tr>
                <td><?php echo e($value->nome); ?> / <?php echo e($value->id); ?></td>
                <td><?php echo e($value->dono->nome); ?></td>
                <td><?php echo e($value->especie); ?></td>
                <td><?php echo e($value->raca); ?></td>
                <td>
                    <form action="<?php echo e(route('animais.destroy',$value->id)); ?>" method="POST">
                        <a class="btn btn-secondary" href="<?php echo e(route('animais.edit',$value->id)); ?>">Editar</a>
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger">Deletar</button>
                    </form>
                </td>
            </tr>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

</div>
</div>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Area de Trabalho\Wallpapers\cadastro\TCC\resources\views/animais/index.blade.php ENDPATH**/ ?>