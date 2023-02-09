<?php $__env->startSection('content'); ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Cadastro de Clientes</h6>
    </div>
    <div class="card-body">



    <div class="row" style="margin-top: 0.1rem; margin-bottom: 1rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="<?php echo e(route('clientes.create')); ?>"> Novo Cliente</a>
            </div>
        </div>
    </div>

    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>

    <table class="table table-bordered">
        <tr>
            <th>Nome / Id</th>
            <th>Qtd de Cachorros</th>
            <th>Endereco</th>
            <th>Telefone</th>
            <th>Descrição</th>

            <th width="280px">Ações</th>
        </tr>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($value->nome); ?> / <?php echo e($value->id); ?></td>
            <td><?php echo e($value->qtdC); ?></td>
            <td><?php echo e($value->endereco); ?></td>
            <td><?php echo e($value->telefone); ?></td>
            <td><?php echo e(\Str::limit($value->descricao, 100)); ?></td>
            <td>

                <form action="<?php echo e(route('clientes.destroy',$value->id)); ?>" method="POST">
                    <a class="btn btn-secondary" href="<?php echo e(route('clientes.edit',$value->id)); ?>">Editar</a>
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

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Area de Trabalho\Wallpapers\cadastro\CadastroFuncionando_\resources\views/clientes/index.blade.php ENDPATH**/ ?>