@extends('layout')

@section('content')
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
        @foreach ($data as $key => $value)
            @if(empty(request()->titulo) || (strpos(strtolower($value->title), strtolower(request()->titulo)) !== false))
            <tr>
                <td>{{ $value->title }} {{ $value->id }}</td>
                <td>{{ $value->animal->nome }}</td>
                <td>{{ \Carbon\Carbon::parse($value->start)->format('d/m/Y H:i:s')}}</td>
                <td>{{ \Carbon\Carbon::parse($value->end)->format('d/m/Y H:i:s')}}</td>
                <td>
                    <form action="{{ route('list.destroy',$value->id) }}" method="POST">
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
