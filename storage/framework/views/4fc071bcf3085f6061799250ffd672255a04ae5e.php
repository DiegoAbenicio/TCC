<?php $__env->startSection('content'); ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Lista de Tarefas</h6>
    </div>
    <div class="card-body">

    <form action="" method="get">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="titulo" placeholder="Pesquisar pelo título">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Pesquisar</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered">
        <tr>
            <th>Titulo</th>
            <th>Nome do Cachorro</th>
            <th>Entrada</th>
            <th>Saida</th>

            <th width="100px">Ações</th>
        </tr>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(empty(request()->titulo) || (strpos(strtolower($value->title), strtolower(request()->titulo)) !== false)): ?>
            <tr>
                <td><?php echo e($value->title); ?> <?php echo e($value->id); ?></td>
                <td><?php echo e($value->animal->nome); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($value->start)->format('d/m/Y H:i:s')); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($value->end)->format('d/m/Y H:i:s')); ?></td>
                <td>
                    <form action="<?php echo e(route('list.destroy',$value->id)); ?>" method="POST">
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

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Area de Trabalho\Wallpapers\cadastro\TCC\resources\views/agenda/list.blade.php ENDPATH**/ ?>