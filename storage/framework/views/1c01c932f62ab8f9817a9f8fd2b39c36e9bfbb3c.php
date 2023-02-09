<?php $__env->startSection('content'); ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Lista de Servicos</h6>
    </div>
    <div class="card-body">

    <div class="row" style="margin-top: 0.1rem; margin-bottom: 1rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="<?php echo e(route('servicos.create')); ?>"> Novo Serviço</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Nome da Tarefa</th>
            <th>Duração da Tarefa</th>
            <th>Cor da Letra</th>
            <th>Cor do Fundo</th>

            <th width="100px">Ações</th>
        </tr>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($value->title); ?></td>
            <td><?php echo e($value->duracao); ?></td>
            <td><?php echo e($value->color); ?></td>
            <td><?php echo e($value->textColor); ?></td>
            <td>
                <form action="<?php echo e(route('servicos.destroy',$value->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <?php echo $data->links(); ?>

</div>
</div>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Area de Trabalho\Wallpapers\cadastro\CadastroFuncionando_\resources\views/servicos/index.blade.php ENDPATH**/ ?>