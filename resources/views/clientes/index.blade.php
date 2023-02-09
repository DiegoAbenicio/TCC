@extends('layout')

@section('content')




    <div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-dark">Cadastro de Clientes</h6>
    </div>
    <div class="card-body">
    <div class="row" style="margin-top: 0.1rem; margin-bottom: 1rem;">
    <div class="col-lg-12 margin-tb">
    <div class="pull-right">
    <a class="btn btn-success" href="{{ route('clientes.create') }}"> Novo Cliente</a>
    </div>
    </div>
    </div>
    <form action="" method="get">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="nome" placeholder="Pesquisar por Nome">
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
            <th>Qtd de Cachorros</th>
            <th>Endereco</th>
            <th>Telefone</th>
            <th>Descrição</th>

            <th width="280px">Ações</th>
        </tr>
        @foreach ($data as $key => $value)
            @if(empty(request()->nome) || (strpos(strtolower($value->nome), strtolower(request()->nome)) !== false))
            <tr>
                <td>{{ $value->nome }} / {{ $value->id }}</td>
                <td>{{ $value->qtdC }}</td>
                <td>{{ $value->endereco }}</td>
                <td>{{ $value->telefone }}</td>
                <td>{{ \Str::limit($value->descricao, 100) }}</td>
                <td>
                    <form action="{{ route('clientes.destroy',$value->id) }}" method="POST">
                        <a class="btn btn-secondary" href="{{ route('clientes.edit',$value->id) }}">Editar</a>
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
