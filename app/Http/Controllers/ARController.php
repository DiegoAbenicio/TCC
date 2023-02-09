<?php

namespace App\Http\Controllers;


use App\Models\Cliente;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ARController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Cliente::all();
        return view('clientes.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //retorna a view com o formulário para inserir os clientes
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validando a necessidadee
        $request->validate([
            'nome' => 'required',
            'qtdC' => 'required',
            'telefone' => 'required',
            'endereco' => 'required',
            'descricao' => 'required',
        ]);

        //inserindo o registro na tabela
        Cliente::create($request->all());

        //redirecionando para a view raiz
        Alert::success('Sucesso', 'O Cliente foir criado com sucesso!');
        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return view('clientes.show',compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //redireciona para a página com o formulário de edição, assando o produto escolhido
        return view('clientes.edit',compact('cliente'));
    }

    public function name(Request $id){

        return compact('cliente');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        #valida, pois existe a necessicade de todos os parametros estarem preenchidos
        $request->validate([
            'nome' => 'required',
            'qtdC' => 'required',
            'telefone' => 'required',
            'endereco' => 'required',
            'coordenadas' => 'required',
            'descricao' => 'required',
        ]);

        //atualiza produto no banco de dados
        $cliente->update($request->all());

        //retorna para a página principal
        Alert::success('Sucesso', 'A alteração foi um sucesso!');
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $clientes = Cliente::query()->find($id);
        $clientes->delete();
        Alert::success('Sucesso', 'A exclusão foi um sucesso!');
        return redirect()->route('clientes.index');
    }



}
