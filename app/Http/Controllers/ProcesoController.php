<?php

namespace App\Http\Controllers;

use App\Models\Proceso;
use Illuminate\Http\Request;


class ProcesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $procesos = Proceso::get();
        return view('procesos.procesosIndex', compact('procesos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('procesos.procesosForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'receta_id'=>['numeric','min:1','required'],
            'posicion'=>['numeric','min:1','required'],
            'titulo'=>['string','max:50','required'],
            'descripcion'=>['string','max:255','required'],
        ]);

        Proceso::create($request->all());
        return redirect('procesos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proceso  $proceso
     * @return \Illuminate\Http\Response
     */
    public function show(Proceso $proceso)
    {
        //
        return view('procesos.procesoShow')
            ->with(['proceso' => $proceso]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proceso  $proceso
     * @return \Illuminate\Http\Response
     */
    public function edit(Proceso $proceso)
    {
        //
        return view('procesos.procesosForm', compact('proceso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proceso  $proceso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proceso $proceso)
    {
        $request->validate([
            'receta_id'=>['numeric','min:1','required'],
            'posicion'=>['numeric','min:1','required'],
            'titulo'=>['string','max:50','required'],
            'descripcion'=>['string','max:255','required'],
        ]);

        //
        Proceso::where('id', $proceso->id)->update($request->except('_method','_token'));
        return redirect()->route('procesos.show', [$proceso]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proceso  $proceso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proceso $proceso)
    {
        //
        $proceso->delete();
        return redirect()->route('procesos.index');
    }
}
