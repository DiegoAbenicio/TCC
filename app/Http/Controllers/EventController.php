<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\Animal;
use App\Models\Servicos;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event=Events::Latest()->get();
        return response()->json($event, 200);

    }

    public function returnAgenda()
    {
        $animal = Animal::latest()->paginate(5);
        $servicos = Servicos::latest()->paginate(5);
        return view('index',compact('animal', 'servicos'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $servicos = Servicos::query()->find($request->evento_id);
            $cor = $servicos->color;
            $textCor = $servicos->textColor;

            $request->merge(['color' => $cor]);
            $request->merge(['textColor' => $textCor]);

            $validator=Validator::make($request->all(), [
                'title' => 'required',
                'start' => 'required',
                'end' => 'required',
                'animal_id' => 'required',
                'color' => 'required',
                'textColor' => 'required',
            ]);
            if($validator->failed()){
                Alert::error('Erro!', $validator->getMessageBag()->first());
                return redirect()->back();
            }else{
                if(!empty($request->id)){
                    Events::where('id',$request->id)->update($request->except(['_token']));
                    Alert::success('Sucesso', 'Evento atulizado com sucesso');
                    return redirect()->back();
                }else{
                    Events::create($request->all());
                    Alert::success('Sucesso', 'O evento foi criado com sucesso ');
                    return redirect()->back();
                };
            }

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evento = Events::query()->find($id);
        $evento->delete();
        Alert::success('Sucesso', 'Evento deletado com');
        return redirect()->back();
    }
}
