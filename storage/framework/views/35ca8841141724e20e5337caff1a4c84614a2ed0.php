<?php $__env->startSection('content'); ?>

<link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet">


<div class="card shadow mb-4">


    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Inserindo Animal</h6>
    </div>
    <div class="card-body">

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Adicionar um novo Cliente</h2>
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


<form class ="was-validated" action ="<?php echo e(route ('clientes.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>

     <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome do Cliente:</strong>
                <input type="text" name="nome" class="form-control is-valid" placeholder="Entre com o nome"required>
            </div>
        </div>

        <div class="form-row col-xs-12 col-sm-12 col-md-12">

            <div class="form-group col-md-6">
                <strong>Endereco:</strong>
                <input type="text" name="endereco" class="form-control is-valid" placeholder="Entre com o endereço do Dono"required>
            </div>

            <div class="form-group col-md-4 ">
                <strong>Coordenadas:</strong>
                <input type="text" name="coordenadas" class="form-control is-valid" placeholder="Busque as coordenadas no mapa abaixo"required>

            </div>

            <div class="form-group col-md-2">
                <br>
                <button type="button" class="form-control" onclick="mudar()">Fechar e Abrir <i class="fas fa-map"></i></button>
            </div>

            <div id="map"></div>
        <!--div linha 2 col-->
        <div class="form-row col-xs-12 col-sm-12 col-md-12">

            <div class="form-group col-md-6">
                <strong>Telefone:</strong>
                <input type="text" name="telefone" class="form-control is-valid" placeholder="Entre com o telefone"required>
            </div>

             <div class="form-group col-md-6 ">
                <strong>Quantidade de Pets:</strong>
                <input type="text" name="qtdC" class="form-control is-valid" placeholder="Entre com a quantidade de pets"required>
            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descrição do Cliente:</strong>
                <textarea class="form-control is-valid" style="height:150px" name="descricao" placeholder="Entre com a descrição" required></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a class="btn btn-danger" href="<?php echo e(route('clientes.index')); ?>"> Voltar </a>
                <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>

</form>
</div>
</div>

<script>
    function mudar() {
      var x = document.getElementById("map");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    };
  </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('clientes.showmap', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Area de Trabalho\Wallpapers\cadastro\CadastroFuncionando_\resources\views/clientes/create.blade.php ENDPATH**/ ?>