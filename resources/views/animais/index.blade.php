@extends('layout')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Cadastro de Animais</h6>
    </div>
    <div class="card-body">


    <div class="row" style="margin-top: 0.1rem; margin-bottom: 1rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('animais.create') }}"> Novo Animal</a>
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


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Nome / Id</th>
            <th>Nome do Dono</th>
            <th>Especie</th>
            <th>Raça</th>
            <th width="280px">Ações</th>
        </tr>
        @foreach ($data as $key => $value)
            @if(empty(request()->nome) || (strpos(strtolower($value->nome), strtolower(request()->nome)) !== false))
            <tr>
                <td>{{ $value->nome }} / {{ $value->id }}</td>
                <td>{{ $value->dono->nome }}</td>
                <td>{{ $value->especie }}</td>
                <td>{{ $value->raca }}</td>
                <td>
                    <form action="{{ route('animais.destroy',$value->id) }}" method="POST">
                        <a class="btn btn-secondary" href="{{ route('animais.edit',$value->id) }}">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Deletar</button>
                    </form>
                </td>
            </tr>
            @endif
        @endforeach
    </table>

</div>
</div>
@include('sweetalert::alert')
@endsection
