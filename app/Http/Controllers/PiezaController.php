<?php

namespace App\Http\Controllers;

use App\Http\Requests\PiezaCreateRequest;
use App\Models\Pieza;
use Illuminate\Http\Request;


class PiezaController extends Controller
{
    public function index(){
        
        $piezas = Pieza::paginate(5);
        return view('piezas.index', compact('piezas'));
    }

    public function create()
    {
        return view('piezas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PiezaCreateRequest $request)
    {
        Pieza::create($request->all());

        return redirect()->route('piezas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pieza $pieza)
    {
    
        return view('piezas.show', compact('pieza'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pieza $pieza)
    {  
        return view('piezas.edit', compact('pieza'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pieza $pieza)
    {
        $pieza->update($request->all());

        return redirect()->route('piezas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pieza $pieza)
    {
       
        $pieza->delete();

        return redirect()->route('piezas.index')->with('eliminar', 'ok');
    }
}
