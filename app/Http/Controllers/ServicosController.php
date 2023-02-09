<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicos;
use RealRashid\SweetAlert\Facades\Alert;

class ServicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Servicos::all();
        return view('servicos.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('servicos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'duracao' => 'required',
            'color' => 'required',
            'textColor' => 'required',
        ]);

        //inserindo o registro na tabela
        Servicos::create($request->all());

        Alert::success('Sucesso', 'Serviço cadastrado com sucesso.');
        return redirect()->route('servicos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servicos  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servicos = Servicos::query()->find($id);
        $servicos->delete();
        Alert::success('Sucesso', 'Serviço deletado com sucesso');
        return redirect()->back();
    }
}
