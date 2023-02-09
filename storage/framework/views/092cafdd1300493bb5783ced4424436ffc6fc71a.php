<?php $__env->startSection('title', __('outlet.list')); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-3">
    <div class="float-right">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', new App\Models\Outlet)): ?>
            <a href="<?php echo e(route('outlets.create')); ?>" class="btn btn-success"><?php echo e(__('outlet.create')); ?></a>
        <?php endif; ?>
    </div>
    <h1 class="page-title"><?php echo e(__('outlet.list')); ?> <small><?php echo e(__('app.total')); ?> : <?php echo e($outlets->total()); ?> <?php echo e(__('outlet.outlet')); ?></small></h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="control-label"><?php echo e(__('outlet.search')); ?></label>
                        <input placeholder="<?php echo e(__('outlet.search_text')); ?>" name="q" type="text" id="q" class="form-control mx-sm-2" value="<?php echo e(request('q')); ?>">
                    </div>
                    <input type="submit" value="<?php echo e(__('outlet.search')); ?>" class="btn btn-secondary">
                    <a href="<?php echo e(route('outlets.index')); ?>" class="btn btn-link"><?php echo e(__('app.reset')); ?></a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm">
                <thead>
                    <tr>
                        <th class="text-center"><?php echo e(__('app.table_no')); ?></th>
                        <th><?php echo e(__('outlet.name')); ?></th>
                        <th><?php echo e(__('outlet.address')); ?></th>
                        <th><?php echo e(__('outlet.latitude')); ?></th>
                        <th><?php echo e(__('outlet.longitude')); ?></th>
                        <th class="text-center"><?php echo e(__('app.action')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $outlets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $outlet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center"><?php echo e($outlets->firstItem() + $key); ?></td>
                        <td><?php echo $outlet->name_link; ?></td>
                        <td><?php echo e($outlet->address); ?></td>
                        <td><?php echo e($outlet->latitude); ?></td>
                        <td><?php echo e($outlet->longitude); ?></td>
                        <td class="text-center">
                            <a href="<?php echo e(route('outlets.show', $outlet)); ?>" id="show-outlet-<?php echo e($outlet->id); ?>"><?php echo e(__('app.show')); ?></a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="card-body"><?php echo e($outlets->appends(Request::except('page'))->render()); ?></div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Area de Trabalho\Wallpapers\cadastro\CadastroFuncionando_\resources\views/outlets/index.blade.php ENDPATH**/ ?>