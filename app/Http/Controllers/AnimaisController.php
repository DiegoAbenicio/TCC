<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Cliente;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AnimaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Animal::all();
        return view('animais.index', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Cliente::latest()->paginate(5);
        return view('animais.create',compact('data'))
        ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $id = $request['dono_id'];

        Alert::success('Sucesso', '{{ $id }}');

        $request->validate([
            'nome' => 'required',
            'dono_id' => 'required',
            'tipodepelo' => 'required',
            'raca' => 'required',
            'descricao' => 'required',
            'especie' => 'required',
        ]);





        Animal::create($request->all());

        Alert::success('Sucesso', 'Animal cadastrado com sucesso.');
        return redirect()->route('animais.index');
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
     * @param  \App\Models\Animal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $animal = Animal::query()->find($id);
        $animal->delete();
        Alert::success('Sucesso', 'Tarefa deletada com sucesso');
        return redirect()->back();
    }
}
