@extends('layout')

@section('content')

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

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form class ="was-validated" action ="{{ route ('servicos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

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
                <a class="btn btn-danger" href="{{ route('servicos.index') }}"> Voltar </a>
                <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>

</form>
</div>
</div>

@endsection
